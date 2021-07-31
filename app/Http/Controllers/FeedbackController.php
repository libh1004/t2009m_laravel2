<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function list_feedback(){
        $feedbacks = Feedback::paginate(20);
        return view("admin.feedback.list-feedback",[
            "feedbacks"=>$feedbacks
        ]);
    }

    public function form_feedback(){
        return view("admin.feedback.form-feedback");
    }

    public function save_feedback(Request $request){
        try{
            $data = array();

            $data["student_name"] = $request->get("student_name");
            $data["student_email"]=$request ->get("student_email");
            $data["student_telephone"]=$request->get("student_telephone");
            $data["feedback"]=$request->get("feedback");

            Feedback::create($data);
            Session::put("message_success","Create feedback successfully");
            return redirect()->to("admin/feedbacks");
        }catch (\Exception $e){}
    }
}
