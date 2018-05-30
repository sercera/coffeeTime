<?php

namespace App\Sites\BACKEND;

use Illuminate\Database\Eloquent\Model;

class caffe extends Model
{
    protected $table = 'caffes';

    public function employees()
    {
        return $this->hasMany('App\BACKEND\employees');
    }
}
