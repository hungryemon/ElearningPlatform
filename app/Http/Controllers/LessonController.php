<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\CourseLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LessonController extends Controller
{
    public function createLesson(Request $request){
        $chapter = Chapter::find($request->get('chapter'));
        $lesson = new CourseLesson();
        $lesson->name = $request->get('title');
        $lesson->description = $request->get('details');
        $lesson->urlVideo = $request->get('videoId');
        $sourceFiles = $request->file('sourceFiles');
        $fileName = time() . '.' . $sourceFiles->getClientOriginalExtension();
        $lesson->urlSourceFiles = $fileName;
        $chapter->lessons()->save($lesson);

        $path = 'sources';

        if (!Storage::directories($path))
        {
            Storage::makeDirectory($path);
        }

        Storage::disk('local')->put('sources/' . $fileName,File::get($sourceFiles));
        return redirect()->route('content.lesson',['courseId' => $lesson->chapter->course->id, 'chapterId' => $lesson->chapter->id]);
    }
    
    public function updateLesson(Request $request){
        $lesson = CourseLesson::find($request->get('lessonId'));
        if($lesson->chapter->course->teacher == Auth::guard('teacher')->user()){

            $lesson->name = $request->get('title');
            $lesson->description = $request->get('details');
            if($request->hasFile('sourceFiles')){
                Storage::disk('local')->put('sources/' . $request->get('sourceFileName'),File::get($request->file('sourceFiles')));
            }
            $lesson->update();
            return redirect()->route('content.lesson',['courseId' => $lesson->chapter->course->id, 'chapterId' => $lesson->chapter->id]);
        }
        return redirect()->back();
    }

    public function deleteLesson($lessonId){
        $lesson = CourseLesson::find($lessonId);
        if($lesson->chapter->course->teacher == Auth::guard('teacher')->user()){
            Storage::Delete('sources/' . $lesson->urlSourceFiles);;
            $lesson->delete();
            return redirect()->route('content.lesson',['courseId' => $lesson->chapter->course->id, 'chapterId' => $lesson->chapter->id]);
        }
        return redirect()->back();
    }
}
