<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list(Request $request){
        $sub = Subject::subData();
        // dd($request);
        return view('admin.subject.list',['data'=> $sub]);
    }

    function add(){

        return view('admin.subject.add');
    }

    function insert(Request $request){

        // dd($request->all());
        $subjectAdd = new Subject;
        $subjectAdd->name = $request->name;
        $subjectAdd->subject_type = $request->subject_type;
        $subjectAdd->subject_code = $request->subject_code;
        $subjectAdd->status = $request->status;
        $subjectAdd->created_by = Auth::user()->id;
        $subjectAdd->save();

       return redirect('admin/subject/list')->with('success', 'Subject Created Successfully');


    }

    function Edit($id){
        $classData = Subject::subjectEditData($id);

        if(!empty($classData)){
            return view('admin.subject.edit',['data'=>$classData]);
        }else{
            Abort(404);
        }
    }

    function Update($id,Request $request){


        $dataEdit = Subject::subjectEditData($id);

        $dataEdit->name = $request->name;
        $dataEdit->subject_type = $request->subject_type;
        $dataEdit->subject_code = $request->subject_code;
        $dataEdit->status = $request->status;
        $dataEdit->save();
        return redirect('admin/subject/list')->with('success','class Updated successfully');

    }

    public function Void($id){
        $data=Subject::find($id);
        if ($data) {
            $data->void = 0;
            $data->save();
           return redirect('admin/subject/list')->with('success', 'User Void successfully');
       } else {
           // Handle the case where the user with the given ID is not found
           return redirect('admin/subject/list')->with('error', 'User not found');
   }


   }
   public function Delete($id){
    $data=Subject::find($id);
        if ($data) {
            $data->delete();

           return redirect('admin/subject/list')->with('success', 'User deleted successfully');
       } else {
           // Handle the case where the user with the given ID is not found
           return redirect('admin/subject/list')->with('error', 'User not found');
   }

   }
}
