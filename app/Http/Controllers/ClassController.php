<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    function list(Request $request){
        $classData = ClassModel::classGetData();

        return view('admin.class.list',['data'=>$classData]);
    }
    function add(){

        return view('admin.class.add');
    }
    function insert(Request $request){
        // dd($request->all());

       $classAdd = new ClassModel;
    //    dd($classAdd->all());
       $classAdd->name = $request->name;
       $classAdd->status = $request->status;
       $classAdd->created_by = Auth::user()->id;

    //    if(!empty($request->status) == 0){
    //     $classAdd->status = 0;
    //    }else{
    //     $classAdd->status = 1;
    //    }

       $classAdd->save();

       return redirect('admin/class/list')->with('success', 'Class Created Successfully');


    }

    function Edit($id){
        $classData = ClassModel::userEditData($id);

        if(!empty($classData)){
            return view('admin.class.edit',['data'=>$classData]);
        }else{
            Abort(404);
        }
    }

    function Update($id,Request $request){


        $dataEdit = ClassModel::userEditData($id);

        $dataEdit->name = $request->name;
        $dataEdit->status = $request->status;
        $dataEdit->save();
        return redirect('admin/class/list')->with('success','class Updated successfully');

    }

    public function Void($id){
        $user=ClassModel::find($id);
        if ($user) {
           $user->void = 0;
           $user->save();
           return redirect('admin/class/list')->with('success', 'User Void successfully');
       } else {
           // Handle the case where the user with the given ID is not found
           return redirect('admin/class/list')->with('error', 'User not found');
   }


   }
   public function Delete($id){
        $user=ClassModel::find($id);
        if ($user) {
           $user->delete();

           return redirect('admin/class/list')->with('success', 'User deleted successfully');
       } else {
           // Handle the case where the user with the given ID is not found
           return redirect('admin/class/list')->with('error', 'User not found');
   }

   }
}
