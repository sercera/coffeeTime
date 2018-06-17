<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="post";
    protected $primaryKey="id";

    public function caffe()
    {
        return $this->belongsTo('App\Models\Caffe', 'fk_for_caffe' , 'caffe_id');
    }
}
