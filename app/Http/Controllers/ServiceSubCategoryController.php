<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class ServiceSubCategoryController extends Controller
{
    public function showAdminServiceSubCategoryPage(Service $service, ServiceCategory $serviceCategory){
        return view('pages.admin.service.sub_category.sub_category_list', ['service_sub_categories' => $service->service_categories()->findOrFail($serviceCategory->id)->service_sub_categories()->get()]);
    }

    public function showAdminDetailServiceSubCategoryPage(Service $service, ServiceCategory $serviceCategory, ServiceSubCategory $serviceSubCategory){
        return view('pages.admin.service.sub_category.sub_category_edit', ['service_sub_category' => $service->service_categories()->findOrFail($serviceCategory->id)->service_sub_categories()->findOrFail($serviceSubCategory->id)]);
    }

    public function showAdminAddServiceSubCategoryPage(Service $service, ServiceCategory $serviceCategory){
        return view('pages.admin.service.sub_category.sub_category_add', ['service_category' => $service->service_categories()->findOrFail($serviceCategory->id)]);
    }

    public function store(Request $request, Service $service, ServiceCategory $serviceCategory){
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        if($validator->fails()){
            return redirect()->route('adminservice-sub-category-add', ['service' => $service->id, 'service_category' => $serviceCategory->id])->withErrors($validator->errors());
        }
        $data = $validator->validated();
        DB::beginTransaction();
        try {
            $service_sub_category = ServiceSubCategory::create([
                'name' => Str::upper($data['name']),
                'image' => null,
                'service_category_id' => $serviceCategory->id
            ]);
            if(isset($data['image'])){
                $filename = $service_sub_category->id."-".'service-sub-category'."-".$service_sub_category->name.".".$data['image']->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/service-sub-categories'), $filename);
                $service_sub_category->image = "images/service-sub-categories/$filename";
            }
            $service_sub_category->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('adminservice-sub-category', ['service' => $service->id, 'service_category' => $serviceCategory->id]);
        }
        return redirect()->route('adminservice-sub-category', ['service' => $service->id, 'service_category' => $serviceCategory->id]);
    }

    public function update(Request $request, Service $service, ServiceCategory $serviceCategory, ServiceSubCategory $serviceSubCategory){
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        if($validator->fails()){
            return redirect()
                ->route('adminservice-sub-category-detail', ['service' => $service->id, 'service_category' => $serviceCategory->id, 'service_sub_category' => $serviceSubCategory->id])
                ->withErrors($validator->errors());
        }
        $data = $validator->validated();
        DB::beginTransaction();
        try {
            $serviceSubCategory->name = $data['name'];
            if(isset($data['image'])){
                File::delete($serviceSubCategory->image);
                $filename = $serviceSubCategory->id."-".'service-sub-category'."-".$serviceSubCategory->name.".".$data['image']->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/service-sub-categories'), $filename);
                $serviceSubCategory->image = "images/service-sub-categories/$filename";
            }
            $serviceSubCategory->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('adminservice-sub-category-detail', ['service' => $service->id, 'service_category' => $serviceCategory->id, 'service_sub_category' => $serviceSubCategory->id]);
        }
        return redirect()->route('adminservice-sub-category', ['service' => $service->id, 'service_category' => $serviceCategory->id]);
    }

    public function delete(Service $service, ServiceCategory $serviceCategory, ServiceSubCategory $serviceSubCategory){
        DB::beginTransaction();
        try {
            $serviceSubCategory->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            File::delete($serviceSubCategory->image);
            return redirect()->route('adminservice-sub-category-detail', ['service' => $service->id, 'service_category' => $serviceCategory->id, 'service_sub_category' => $serviceSubCategory->id]);
        }
        return redirect()->route('adminservice-sub-category', ['service' => $service->id, 'service_category' => $serviceCategory->id]);
    }
}
