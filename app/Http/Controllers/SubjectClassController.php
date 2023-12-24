<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\SubjectClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectClassController extends Controller
{
    public function list(Request $request)
    {

        $assignList = SubjectClassModel::classGetData();

        return view('admin.assign_subject.list', ['data' => $assignList]);
    }

    public function add()
    {
        $data['getClassData'] = ClassModel::getClass();
        $data['getSubjectData'] = Subject::getSubject();

        return view('admin.assign_subject.add', $data);
    }

    public function insert(Request $request)
    {

        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {

                $getFirst = SubjectClassModel::getFirst($request->class_id, $request->subject_id);

                if (!empty($getFirst)) {
                    $getFirst->status = $request->status;
                    $getFirst->save();
                    return redirect()->back()->with('warning', 'Subject Already Assign in this class');
                } else {
                    $subjectAssign = new SubjectClassModel;
                    $subjectAssign->class_id = $request->class_id;
                    $subjectAssign->subject_id = $subject_id;
                    $subjectAssign->status = $request->status;
                    $subjectAssign->created_by = Auth::user()->id;
                    $subjectAssign->save();
                }
            }
            return redirect('admin/assign_subject/list')->with('success', 'Data Submitted Successfully');
        } else {
            return redirect()->back()->with('error', 'Due to Some error Please try again');
        }

    }
    public function Delete()
    {
        $data = SubjectClassModel::subClassData($id);
        if ($data) {
            $data->status = 0;
            $data->save();

            return redirect('admin/subject/list')->with('success', 'User deleted successfully');
        } else {
            // Handle the case where the user with the given ID is not found
            return redirect('admin/subject/list')->with('error', 'User not found');
        }

    }

    public function Edit($id){

        
    }
}
