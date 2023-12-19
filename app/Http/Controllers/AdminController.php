<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function list(Request $request){
        $users = User::userData();
        // dd($request);
        return view('admin.admin.list',['user'=> $users]);
    }
    public function Add(){
        return view('admin.admin.add');
    }
    public function insert(Request $request){
        request()->validate([
            'email'=>'required | email |unique:users'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = trim($request->type);
        $user->save();
        return redirect('admin/list')->with('success','New Member created successfully');

    }
    public function Update($id,Request $request){
        request()->validate([
            'email'=>'required | email |unique:users,email',
        ]);
        $user = User::userEditData($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = trim($request->type);
        $user->save();
        return redirect('admin/list')->with('success','User Update successfully');

    }

    public function Edit($id){
        $users = User::userEditData($id);
        if(!empty($users)){
            return view('admin.admin.edit',['user'=> $users]);
        }else{
            Abort(404);
        }

    }

    public function Void($id){
         $user=User::find($id);
         if ($user) {
            $user->void = 0;
            $user->save();
            return redirect('admin/list')->with('success', 'User Void successfully');
        } else {
            // Handle the case where the user with the given ID is not found
            return redirect('admin/list')->with('error', 'User not found');
    }


    }
    public function Delete($id){
         $user=User::find($id);
         if ($user) {
            $user->delete();

            return redirect('admin/list')->with('success', 'User deleted successfully');
        } else {
            // Handle the case where the user with the given ID is not found
            return redirect('admin/list')->with('error', 'User not found');
    }


    }

}
