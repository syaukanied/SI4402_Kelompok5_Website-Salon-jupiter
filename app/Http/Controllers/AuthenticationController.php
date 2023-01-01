<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthenticationController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['email', 'required'],
            'password' => ['required'],
            'submit-user' => ['sometimes'],
            'submit-barber' => ['sometimes']
        ]);
        if($validator->fails()){
            return redirect()->route('home')
                ->with('login-fail', 'Error Email or Password!')
                ->withErrors($validator->errors());
        }
        $data = $validator->validated();
        // if login submit is user then
        if(isset($data['submit-user'])){
            return $this->loginUser($data);
        }
        // else
        if(isset($data['submit-barber'])){
            return $this->loginBarber($data);
        }
    }

    private function loginUser($data){
        $this->logoutAuth();
        if(Auth::guard('web')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            // return redirect to service main menu
            return redirect()->route('home');
        }
        // return redirect to login page with error login message
        return redirect()->route('home')
            ->with('login-fail', 'Error Email or Password!')
            ->withErrors(['Error Email or Password!']);
    }

    private function loginBarber($data){
        $this->logoutAuth();
        if(Auth::guard('web_barber')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            // return redirect to service main menu
            return redirect()->route('home');
        }
        // return redirect to login page with error login message
        return redirect()->route('home')
            ->with('login-fail', 'Error Email or Password!')
            ->withErrors(['Error Email or Password!']);
    }

    private function logoutAuth(){
        Auth::guard('web')->logout();
        Auth::guard('web_barber')->logout();
    }

    public function logout(){
        $this->logoutAuth();
        return redirect()->route('home');
    }
}
