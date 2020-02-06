<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseLesson;
use Illuminate\Http\Request;
use Vinkla\Vimeo\Facades\Vimeo;

class VideoController extends Controller
{
    public function uploadVideo(Request $request){
        ini_set('max_execution_time', 180);
        ignore_user_abort(1);
        $title = $request->get('title');
        $video = $request->file('video');
        $path =  $video->getRealPath();
        $response = Vimeo::upload($path,false);
        Vimeo::request($response,['name' => $title],'PATCH');
        echo $response;
    }

    public function updateVideo(Request $request,$courseId){
        ini_set('max_execution_time', 180);
        ignore_user_abort(1);
        $title = $request->get('title');
        $pastVideo = $request->get('videoId');
        $course = Course::find($courseId);
        Vimeo::request($pastVideo,[],'DELETE');
        $video = $request->file('video');
        $path =  $video->getRealPath();

        $response = Vimeo::upload($path,false);
        Vimeo::request($response,['name' => $title],'PATCH');
        echo $course->courseDetails->introVideo = $response;
        $course->courseDetails->update();
        echo $response;
    }
    
    public function updateLessonVideo(Request $request,$lessonId){
        ini_set('max_execution_time', 180);
        ignore_user_abort(1);
        $title = $request->get('title');
        $pastVideo = $request->get('videoId');
        $lesson = CourseLesson::find($lessonId);
        Vimeo::request($pastVideo,[],'DELETE');
        $video = $request->file('video');
        $path =  $video->getRealPath();

        $response = Vimeo::upload($path,false);
        Vimeo::request($response,['name' => $title],'PATCH');
        $lesson->urlVideo = $response;
        $lesson->update();
        echo $response;
    }
}
