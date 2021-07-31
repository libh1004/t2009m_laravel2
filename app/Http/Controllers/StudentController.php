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
            Student::create([
                "feedback"=>$request->get("feedback")
            ]);
            Session::put("message_success","Create feedback successfully");
            return redirect()->to("admin/students");
        }catch (\Exception $e){}
    }
}
