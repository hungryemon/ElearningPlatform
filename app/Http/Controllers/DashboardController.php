<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chapter;
use App\Course;
use App\CourseLesson;
use App\Subcategory;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Vimeo\Facades\Vimeo;

class DashboardController extends Controller
{
    public function viewDashboard(){
        $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
        return view('teacher.dashboard')->with('lastName',ucfirst($teacher->teacherDetails->lastName));
    }
    
    public function viewCreateCourse(){
        $category = Category::all();
        return view('teacher.createCourse')->with('categories',$category);
    }

    public function viewContent(){
        $course = Course::where('teacher_id','=',Auth::guard('teacher')->user()->id)->orderBy('created_at','DESC')->get();
        return view('teacher.content')->with('courses',$course);
    }
    
    public function viewCourseContent(Request $request, $courseId){
        $course = Course::find($courseId);
        if(Auth::guard('teacher')->user() == $course->teacher){
            return view('teacher.courseContent')->with('course',$course);
        }
        return redirect()->back();
    }

    public function viewAllCourse(){
        $course = Course::where('teacher_id',Auth::guard('teacher')->user()->id)->latest()->get();
        return view('teacher.allCourse')->with('courses',$course);
    }

    public function editCourse($courseId){
        $course = Course::find($courseId);
        if($course->teacher_id == Auth::guard('teacher')->user()->id){
            $category = Category::all();
            $subcategory = Subcategory::where('category_id','=',$course->category_id)->get();
            $url = $course->courseDetails->introVideo;
            $response = Vimeo::request($url, [], 'PATCH');
            return view('teacher.editCourse')->with('course',$course)->with('categories',$category)->with('subcategories',$subcategory)->with('videoURL',$response['body']['embed']['html']);
        }
        return redirect()->back();
    }
    
    public function editLesson($courseId,$lessonId){
        $course = Course::find($courseId);
        if($course->teacher == Auth::guard('teacher')->user()){
            $lesson = CourseLesson::find($lessonId);
            $url = $lesson->urlVideo;
            $response = Vimeo::request($url, [], 'PATCH');
            return view('teacher.editLesson')->with('lesson',$lesson)->with('videoURL',$response['body']['embed']['html']);
        }
    }
    
    public function viewCourseLessons($courseId,$chapterId){
        $chapter = Chapter::find($chapterId);
        if(Auth::guard('teacher')->user()->id == $chapter->course->teacher_id){
            $lessons = CourseLesson::where('chapter_id','=',$chapterId)->get();
            return view('teacher.courseLesson')->with('lessons',$lessons)->with('chapter',$chapter);
        }
    }

    public function viewCreateNewLessons($courseId,$chapterId){
        $chapter = Chapter::find($chapterId);
        if(Auth::guard('teacher')->user()->id == $chapter->course->teacher_id){
            return view('teacher.createLesson')->with('chapter',$chapter);
        }
    }
}