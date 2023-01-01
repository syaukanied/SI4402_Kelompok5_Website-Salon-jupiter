<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarberRequest;
use App\Http\Requests\UpdateBarberRequest;
use App\Models\Barber;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class BarberController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['email', 'required', 'unique:barbers,email'],
            'name' => ['string', 'required'],
            'password' => ['string', 'required'],
            'phone_number' => ['string', 'required'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
            'rate' => ['nullable', 'numeric']
        ]);

        if($validator->fails()){
            return redirect()->route('adminbarber')
            ->with('barber-add-fail', 'Error occured when adding new barber')
            ->withErrors($validator->errors());
        }

        $data = $validator->validated();
        DB::beginTransaction();
        try {
            $barber = Barber::create([
                'email' => $data['email'],
                'name' => $data['name'],
                'password' => bcrypt($data['password']),
                'phone_number' => $data['phone_number'],
                'image' => null,
                'rate' => $data['rate'],
            ]);
            if(isset($data['image'])){
                $filename = $barber->id."-"."barber"."-".$barber->email.".".$data['image']->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/profiles'), $filename);
                $barber->image = "images/profiles/$filename";
                $barber->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            File::delete($barber->image);
            return redirect()->route('adminbarber')->with('barber-add-fail', 'Error occured when adding new barber');
        }
        return redirect()->route('adminbarber');
    }

    public function update(Request $request, Barber $barber){
        $validator = Validator::make($request->all(), [
            'name' => ['string', 'required'],
            'new_password' => ['sometimes'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
            'phone_number' => ['string', 'required'],
            'rate' => ['nullable', 'numeric']
        ]);

        if($validator->fails()){
            return redirect()->route('adminbarber-detail', $barber->id);
        }
        $data = $validator->validated();
        DB::beginTransaction();
        try {
            $barber->fill([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'rate' => $data['rate'],
            ]);
            if($data['new_password'] != null){
                $barber->password = bcrypt($data['new_password']);
            }

            if(isset($data['image'])){
                File::delete($barber->image);
                $filename = $barber->id."-"."barber"."-".$barber->email.".".$data['image']->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/profiles'), $filename);
                $barber->image = "images/profiles/$filename";
            }
            $barber->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('adminbarber-detail', $barber->id);
        }
        return redirect()->route('adminbarber-detail', $barber->id);
    }

    public function delete(Barber $barber){
        DB::beginTransaction();
        try{
            $barber->delete();
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('adminbarber');
        }
        return redirect()->route('adminbarber');
    }

    public function updateBarberProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['string', 'required'],
            'new_password' => ['sometimes'],
            'phone_number' => ['string', 'required'],
            'rate' => ['nullable', 'numeric']
        ]);

        if($validator->fails()){
            return redirect()->route('admin');
        }
        $data = $validator->validated();
        $barber = Barber::findOrFail(Auth::guard('web_barber')->user()->id);
        DB::beginTransaction();
        try {
            $barber->fill([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'rate' => $data['rate'],
            ]);
            if($data['new_password'] != null){
                $barber->password = bcrypt($data['new_password']);
            }
            $barber->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin');
        }
        return redirect()->route('admin');
    }

    public function updateBarberProfileImage(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg']
        ]);

        if($validator->fails()){
            return redirect()->route('admin');
        }

        $data = $validator->validated();
        $barber = Barber::findOrFail(Auth::guard('web_barber')->user()->id);

        $filename = $barber->id."-"."barber"."-".$barber->email.".".$data['image']->getClientOriginalExtension();

        File::delete($barber->image);
        $request->file('image')->move(public_path('images/profiles'), $filename);
        $barber->image = "images/profiles/$filename";
        $barber->save();
        return redirect()->route('admin');
    }

    public function showIndexBarberPage(){
        $barbers = Barber::all();
        return view('pages.admin.barber.barber_list', ['barbers' => $barbers]);
    }

    public function showDetailBarberPage(Barber $barber){
        return view('pages.admin.barber.barber_edit', ['barber' => $barber]);
    }

    public function showAddBarberPage(){
        return view('pages.admin.barber.barber_add');
    }
}
