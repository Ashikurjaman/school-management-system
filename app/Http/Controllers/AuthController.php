<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Str;
use App\Mail\ForgetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class AuthController extends Controller
{
    public function login(){
        // dd(Hash::make(123456));

        if(!empty(Auth::check())){
            if(Auth::user()->user_type==1){
                return redirect('admin/dashboard');
            }else if(Auth::user()->user_type==2){

                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type==3){

                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type==4){
                return redirect('parent/dashboard');

            }
        }
        return view("Auth.login");
    }
    public function AuthLogin(Request $request){



        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true)){

            if(Auth::user()->user_type==1){
                return redirect('admin/dashboard');
            }else if(Auth::user()->user_type==2){

                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type==3){

                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type==4){
                return redirect('parent/dashboard');

            }


        }else{
            return redirect()->back()->with('error','Email and Password wrong');
        }
    }

    public function AuthLogout(){
        Auth::logout();
        return redirect(url(''));
    }
    public function ForgetPassword(){

        return view("Auth.forget");

    }

    public function PostForgetPassword(Request $request){
        $user=User::emailCheck($request->email);

        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgetPassword($user));
            return redirect()->back()->with('success','Please check your mail');

        }else{
            return redirect()->back()->with('error','Email Not Found');
        }
    }

    public function Reset($token){
        $user = User::tokenCheck($token);
        if(!empty($user)){
            $data['user']=$user;
            return view('Auth.reset',$data);
        }else{
            abort(404);
        }
    }

    public function PostReset($token, Request $request){
        if($request->password == $request->cpassword){
            $user = User::tokenCheck($token);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/')->with('success','Password Reset Successfully');
        }else{
            return redirect()->back()->with('errors',"password doesn't match");
        }
    }
}
