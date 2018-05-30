<?php

namespace App\Sites\BACKEND;

use Illuminate\Database\Eloquent\Model;

class table extends Model
{
    public function caffe()
    {
        return $this->belongsTo('App\BACKEND\caffe');
    }
}
