<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();

        // return to index services with data
        return $services;
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg']
        ]);

        if($validator->fails()){
            return redirect()->route('adminbarber-add')->withErrors($validator->errors());
        }

        $data = $validator->validated();
        try {
            $service = Service::create([
                'name' => Str::upper($data['name']),
                'image' => null
            ]);
            if(isset($data['image'])){
                $filename = $service->id."-".'service'."-".$service->name.".".$data['image']->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/services'), $filename);
                $service->image = "images/services/$filename";
            }
            $service->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('adminbarber-add');
        }
        return redirect()->route('adminservice');

    }

    public function show(Service $service){
        // return to detail service with data
        return $service->load(['service_categories', 'service_sub_categories']);
    }

    public function update(Request $request, Service $service){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg']
        ]);

        if($validator->fails()){
            return redirect()->route('adminservice-detail', $service->id)->withErrors($validator->errors());
        }

        $data = $validator->validated();
        DB::beginTransaction();
        try {
            $service->name = $data['name'];
            if(isset($data['image'])){
                File::delete($service->image);
                $filename = $service->id."-".'service'."-".$service->name.".".$data['image']->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/services'), $filename);
                $service->image = "images/services/$filename";
            }
            $service->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('adminservice-detail', $service->id);
        }
        return redirect()->route('adminservice-detail', $service->id);
    }

    public function delete(Service $service){
        DB::beginTransaction();
        try {
            $service->delete();
            $service->service_categories()->delete();
            $service->service_sub_categories()->delete();
            File::delete($service->image);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('adminservice-detail', $service->id);
        }
        return redirect()->route('adminservice');
    }

    public function showAdminServicePage(){
        $services = Service::all();
        return view('pages.admin.service.service_list', ['services' => $services]);
    }

    public function showAdminAddServicePage(){
        return view('pages.admin.service.service_add');
    }

    public function showAdminDetailServicePage(Service $service){
        return view('pages.admin.service.service_edit', ['service' => $service]);
    }
}
