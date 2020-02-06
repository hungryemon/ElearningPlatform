<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public $incrementing = false;

    protected $hidden = ['password','hash'];

    public function teacherDetails(){
        return $this->morphOne('App\UserDetail','userDetail');
    }
    
    public function courses(){
        return $this->hasMany('App\Course');
    }
}
