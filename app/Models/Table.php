<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function caffe()
    {
        return $this->belongsTo('App\Models\Caffe');
    }
}
