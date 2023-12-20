<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\SubjectClassModel;
use Illuminate\Support\Facades\Auth;

class SubjectClassController extends Controller
{
    public function list(Request $request){

        $assignList = SubjectClassModel::classGetData();

        return view('admin.assign_subject.list',['data'=>$assignList]);
    }

    public function add(){
        $data['getClassData'] =ClassModel::getClass();
        $data['getSubjectData'] =  Subject::getSubject();

        return view('admin.assign_subject.add',$data);
    }

    public function insert(Request $request){

        // dd($request->all());

        for ($i=0; $i <count($request->subject_id) ; $i++) {

            $data[]=[

                'class_id' =>$request->class_id,
                'subject_id'=> $request->subject_id[$i],
                'status' =>$request->status,
                'created_by' => Auth::user()->id
            ];

        }
        SubjectClassModel::insert($data);

        return redirect('admin/assign_subject/list')->with('success','Data Submitted Successfully');

        // $subjectAssign = new SubjectClassModel;
        // $subjectAssign->class_id =$request->class_id;

        // $subjectAssign->subject_id =$request->subject_id;
        // $subjectAssign->status =$request->status;
        // $subjectAssign->created_by = Auth::user()->id;
        // $subjectAssign->save();




    }
}
