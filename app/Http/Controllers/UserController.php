<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // equals to register new user
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['email', 'required', 'unique:users,email'],
            'name' => ['required', 'string'],
            'phone_number' => ['required', 'string', 'regex:^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$^'],
            'gender' => ['required', 'in:1,2'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        
        if($validator->fails()){
            return redirect()->route('home')
            ->with('registration-fail', 'Error occured when registering new account')
            ->withErrors($validator->errors());
        }
        $data = $validator->validated();
        DB::beginTransaction();
        try {
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('home')->with('registration-fail', 'Error occured when registering new account');
        }
        return redirect()->route('home')->with('registration-success', 'Successfully register new account');
    }

    // udpate user profile
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'phone_number' => ['required', 'string', 'regex:^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$^'],
            'gender' => ['required', 'in:1,2'],
            'address' => ['required', 'string']
        ]);
        if($validator->fails()){
            return redirect()->route('home')
                ->with('update-profile-fail', 'Error occured when updating profile information')
                ->withErrors($validator->errors());
        }
        $data = $validator->validated();
        DB::beginTransaction();
        try {
            $user = User::findOrFail(Auth::guard('web')->user()->id);
            $user->update($data);
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('home')->with('update-profile-fail', 'Error occured when updating profile information');
        }
        return redirect()->route('home')->with('update-profile-success', 'Successfully update profile information');
    }

    public function updateImageProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => ['image', 'mimes:png,jpg,jpeg']
        ]);

        $data = $validator->validated();
        $user = User::findOrFail(Auth::guard('web')->user()->id);
        try {
            $path = 'storage/images/profile';
            $filename = $user->id."-"."user"."-".$user->email.".".$data['image']->getClientOriginalExtension();
            Storage::putFileAs(
                'public/images/profile',
                $data['image'],
                $filename,
                'public'
            );
            $user->image = "$path/$filename";
            $user->save();
        } catch (\Exception $e) {
            DB::rollBack();
            Storage::delete("$path/$filename");
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }
}
