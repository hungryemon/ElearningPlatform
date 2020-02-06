<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Course;
use App\CourseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{

    public function createCourse(Request $request){
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $cost=0;
        $saleCost=0;

        $course = new Course();
        $courseDetails = new CourseDetail();

        $course->id = time();
        $course->name = $request->get('title');
        $course->featuredImage = $imageName;
        $course->cost = $cost;
        $course->saleCost = $saleCost;
        $course->category_id = $request->get('category');
        $course->subcategory_id = $request->get('subcategory');
        $course->teacher_id = Auth::guard('teacher')->user()->id;

        $course->save();

        $path = 'courses';

        if (!Storage::directories($path))
        {
            Storage::makeDirectory($path);
        }

        Storage::disk('local')->put('courses/' . $imageName,File::get($image));

        $courseDetails->description = $request->get('desc');
        $courseDetails->courseOutcome = $request->get('outcome');
        $courseDetails->duration = $request->get('duration');
        $courseDetails->introVideo = $request->get('videoId');
        $course->courseDetails()->save($courseDetails);

        return redirect()->route('content.chapter',['courseId' => $course->id]);
    }
    
    public function createChapter(Request $request){
        $course = Course::find($request->get('courseId'));
        $chapter = new Chapter();
        $chapter->chapterName = $request->get('chapterName');
        $course->chapters()->save($chapter);
        echo $chapter->id;
    }

    public function updateCourse(Request $request,$courseId){
        $course = Course::find($courseId);

        $imageName = $request->get('imageName');
        $cost=0;
        $saleCost=0;

        $course->name = $request->get('title');
        $course->featuredImage = $imageName;
        $course->cost = $cost;
        $course->saleCost = $saleCost;
        $course->category_id = $request->get('category');
        $course->subcategory_id = $request->get('subcategory');
        $course->teacher_id = Auth::guard('teacher')->user()->id;

        $course->update();

        $course->courseDetails->description = $request->get('desc');
        $course->courseDetails->courseOutcome = $request->get('outcome');
        $course->courseDetails->duration = $request->get('duration');
        $course->courseDetails->update();


        if($request->hasFile('image')){
            $image = $request->file('image');
            Storage::disk('local')->put('courses/' . $imageName,File::get($image));
        }

        return redirect()->route('course.all');
    }
}
