<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    public function chapter(){
        return $this->belongsTo('App\Chapter');
    }
}
