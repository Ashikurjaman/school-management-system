<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function list(){
        $users = User::userData();
        return view('admin.admin.list',['user'=> $users]);
    }
    public function Add(){
        return view('admin.admin.add');
    }
    public function insert(Request $request){
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = trim($request->type);
        $user->save();
        return redirect('admin/list')->with('success','New Member created successfully');

    }
}
