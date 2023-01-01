<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;



class ServiceCategoryController extends Controller
{
    public function showAdminServiceCategoryPage(Service $service){
        return view('pages.admin.service.category.category_list', ['service_categories' => $service->service_categories()->get()]);
    }

    public function showAdminDetailServiceCategoryPage(Service $service, ServiceCategory $serviceCategory){
        return view('pages.admin.service.category.category_edit', ['service' => $service, 'service_category' => $serviceCategory]);
    }

    public function showAdminAddServiceCategoryPage(Service $service){
        return view('pages.admin.service.category.category_add', ['service' => $service]);
    }

    public function store(Request $request, Service $service){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:service_categories,name'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        if($validator->fails()){
            return redirect()->route('adminservice-category-add', ['service' => $service->id])->withErrors($validator->errors());
        }
        $data = $validator->validated();
        DB::beginTransaction();
        try {
            $service_category = ServiceCategory::create([
                'name' => Str::upper($data['name']),
                'image' => null,
                'service_id' => $service->id
            ]);
            if(isset($data['image'])){
                $filename = $service_category->id."-".'service-category'."-".$service_category->name.".".$data['image']->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/service-categories'), $filename);
                $service_category->image = "images/service-categories/$filename";
            }
            $service_category->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('adminservice-category', request()->service->id);
        }
        return redirect()->route('adminservice-category', request()->service->id);
    }

    public function update(Request $request, Service $service, ServiceCategory $serviceCategory){
        $validator = Validator::make($request->all(), [
            'name' => ['required', Rule::unique('service_categories', 'name')->ignore($serviceCategory->id)],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        if($validator->fails()){
            return redirect()->route('adminservice-category-detail', ['service' => $service->id])->withErrors($validator->errors());
        }
        $data = $validator->validated();
        DB::beginTransaction();
        try {
            $serviceCategory->name = $data['name'];
            if(isset($data['image'])){
                File::delete($serviceCategory->image);
                $filename = $serviceCategory->id."-".'service-category'."-".$serviceCategory->name.".".$data['image']->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/service-categories'), $filename);
                $serviceCategory->image = "images/service-categories/$filename";
            }
            $serviceCategory->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('adminservice-category', request()->service->id);
        }
        return redirect()->route('adminservice-category', request()->service->id);
    }

    public function delete(Service $service, ServiceCategory $serviceCategory){
        DB::beginTransaction();
        try {
            $serviceCategory->service_sub_categories()->delete();
            $serviceCategory->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            File::delete($serviceCategory->image);
            return redirect()->route('adminservice-category-detail', ['service' => $service->id, 'service_category' => $serviceCategory->id]);
        }
        return redirect()->route('adminservice-category', $service->id);
    }
}
