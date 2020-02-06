<?php

namespace App\Http\Controllers;

use App\Mail\sendEmailConfirmation;
use App\Teacher;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailer as Mailer;

class TeacherController extends Controller
{
    public function newMentor(request $request, Mailer $mailer){

        $this->validate($request,[
            'email'  => 'email|unique:teachers',
            'password'  =>  'min:8'
        ]);

        $firstName = trim($request->get('firstName'));
        $lastName = trim($request->get('lastName'));
        $email = trim($request->get('email'));
        $password = bcrypt(trim($request->get('password')));
        $id = time();
        $hash = md5($id);

        $teacher = new Teacher();
        $teacherDetails = new UserDetail();
        $teacher->id = $id;
        $teacher->email = $email;
        $teacher->password = $password;
        $teacher->hash = $hash;
        $teacher->isActive = 0;
        $teacher->isBlock = 0;
        $teacherDetails->firstName = $firstName;
        $teacherDetails->lastName = $lastName;

        $teacher->save();
        $teacher->teacherDetails()->save($teacherDetails);
        $mailer->to($email)->send(new sendEmailConfirmation($id,$hash));
        return redirect()->route('mentor.dashboard');
    }

    public function login(Request $request){
        if(Auth::guard('teacher')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
            return redirect()->route('mentor.dashboard');
        }
        return redirect()->back();
    }

    public function mailConfirm(Request $request,$id,$hash){
        $teacher = Teacher::find($id);
        if($teacher->isActive){
            return redirect()->route('mentor.dashboard');
        }
        if($teacher->hash == $hash){
            $teacher->isActive = 1;
            $teacher->update();
            echo 'Your Email Has Been Confirmed';
        }
        else{
            echo 'The Code Is Wrong!!';
        }

    }

    public function success(){
        echo 'Please Activate email';
    }
}
