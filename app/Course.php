<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function courseDetails(){
        return $this->hasOne('App\CourseDetail');
    }

    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }

    public function chapters(){
        return $this->hasMany('App\Chapter');
    }

    public function lessons(){
        return $this->hasManyThrough('App\CourseLesson','App\Chapter','course_id');
    }
}
