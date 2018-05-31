<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function caffeEntity()
    {
        return $this->belongsTo('App\Models\Caffe');
    }
}
