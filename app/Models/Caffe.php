<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caffe extends Model
{
    protected $table = 'caffe';

    public function employees()
    {
        return $this->hasMany('App\BACKEND\employees');
    }
    public function table()
    {
        return $this->hasMany('App\BACKEND\table');
    }
    public function menu()
    {
        return $this->hasOne('App\BACKEND\menu');
    }
}
