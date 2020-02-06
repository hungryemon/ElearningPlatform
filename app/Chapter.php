<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function lessons(){
        return $this->hasMany('App\CourseLesson');
    }
}
