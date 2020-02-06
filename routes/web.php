<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/mentorSignup',[
    'uses'  =>  'TeacherController@newMentor',
    'as'    =>  'mentor.signup'
]);

Route::post('/mentorLogin',[
    'uses'  =>  'TeacherController@login',
    'as'    =>  'mentor.mentorLogin'
]);

Route::get('mentor/login', function(){
    return view('teacher.login');
})->name('mentor.login');

Route::get('mentor/success',[
    'uses'  =>  'TeacherController@success',
    'as'    =>  'mentor.success'
]);

Route::get('mentor/confirmEmail/{id}/{hash}',[
    'uses'  =>  'TeacherController@mailConfirm',
    'as'    =>  'mentor.confirm'
]);

Route::group(['prefix' => 'mentor', 'middleware' => 'teacher'], function(){

    Route::get('/dashboard',[
        'uses'  => 'DashboardController@viewDashboard',
        'as'    => 'mentor.dashboard'
    ]);

    Route::get('/course/new', [
        'uses'  =>  'DashboardController@viewCreateCourse',
        'as'    =>  'course.new'
    ]);

    Route::get('/content', [
        'uses'  =>  'DashboardController@viewContent',
        'as'    =>  'content'
    ]);

    Route::get('/content/{courseId}/chapter',[
        'uses'  => 'DashboardController@viewCourseContent',
        'as'    => 'content.chapter'
    ]);

    Route::get('/content/{courseId}/{chapterId}/lesson',[
        'uses'  =>  'DashboardController@viewCourseLessons',
        'as'    =>  'content.lesson'
    ]);

    Route::get('/content/{courseId}/{chapterId}/lesson/new',[
        'uses'  =>  'DashboardController@viewCreateNewLessons',
        'as'    =>  'content.new'
    ]);


    Route::get('images/courses/{imageName}',[
        'uses'  => 'ImageController@courseImage',
        'as'    => 'course.image'
    ]);

    Route::get('/courses/all',[
        'uses'  => 'DashboardController@viewAllCourse',
        'as'    => 'course.all'
    ]);

    Route::get('/course/{courseId}/edit',[
        'uses'  =>  'DashboardController@editCourse',
        'as'    =>  'course.edit'
    ]);

    Route::get('/content/lesson/{courseId}/{lessonId}/edit',[
        'uses'  =>  'DashboardController@editLesson',
        'as'    =>  'lesson.edit'
    ]);

    Route::post('/course/video/upload',[
        'uses'  =>  'VideoController@uploadVideo',
        'as'    =>  'upload.video'
    ]);

    Route::post('/course/{courseId}/video/update',[
        'uses'  =>  'VideoController@updateVideo',
        'as'    =>  'update.video'
    ]);

    Route::post('/lesson/{lessonId}/video/update',[
        'uses'  =>  'VideoController@updateLessonVideo',
        'as'    =>  'update.lesson.video'
    ]);

    Route::post('/course/{courseId}/update',[
        'uses'  =>  'CourseController@updateCourse',
        'as'    =>  'course.update'
    ]);

    Route::post('/subcategory/generate',[
        'uses'  =>  'ajaxController@getSubcategory',
        'as'    =>  'generate.subcategory'
    ]);

    Route::post('/chapter/update',[
        'uses'  =>  'ajaxController@editChapter',
        'as'    =>  'chapter.update'
    ]);

    Route::post('/chapter/delete',[
        'uses'  =>  'ajaxController@deleteChapter',
        'as'    =>  'chapter.delete'
    ]);

    Route::post('/course/new/create',[
        'uses'  =>  'CourseController@createCourse',
        'as'    =>  'course.create'
    ]);

    Route::post('/course/chapter/new',[
        'uses'  =>  'CourseController@createChapter',
        'as'    =>  'create.chapter'
    ]);

    Route::post('/course/chapter/lesson/new',[
        'uses'  =>  'LessonController@createLesson',
        'as'    =>  'create.lesson'
    ]);

    Route::post('/course/chapter/lesson/update',[
        'uses'  =>  'LessonController@updateLesson',
        'as'    =>  'lesson.update'
    ]);

    Route::get('/course/lesson/{lessonId}/delete',[
        'uses'  =>  'LessonController@deleteLesson',
        'as'    =>  'lesson.delete'
    ]);
});
