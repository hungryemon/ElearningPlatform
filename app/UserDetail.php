<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function userDetail(){
        return $this->morphTo();
    }
}
