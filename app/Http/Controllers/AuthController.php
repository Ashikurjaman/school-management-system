<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        // dd(Hash::make(123456));
        if(!empty(Auth::check())){
            return redirect('admin/dashboard');
        }
        return view("Auth.login");
    }
    public function AuthLogin(Request $request){

        

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true)){
            return redirect('admin/dashboard');

        }else{
            return redirect()->back()->with('error','Email and Password wrong');
        }
    }

    public function AuthLogout(){
        Auth::logout();
        return redirect(url(''));
    }
}
