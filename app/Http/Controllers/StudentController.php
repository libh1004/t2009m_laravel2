<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function list_student(){
        $students = Student::paginate(20);
        return view("admin.student.list-student",[
            "students"=>$students
        ]);
    }

    public function feed_back($student_id){
        $student = Student::findOrFail($student_id);
        return view("admin.student.form-feedback",[
            "student"=>$student
        ]);
    }

    public function save_feedback(Request $request){
        try{
            $data = array();
            $data = [
                "student_name" => $request->get("student_name"),
                "student_email" => $request->get("student_email"),
                "student_telephone" => $request->get("student_telephone"),
                "feedback" => $request->get("feedback")
            ];
            Student::create($data);
            Session::put("message_success","Create feedback successfully");
            return redirect()->to("admin/students");
        }catch (\Exception $e){}
    }
}
