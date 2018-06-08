<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = "tables";
    protected $primaryKey = "table_id";

    protected $fillable = [

        'table_number',
        'table_spots',
        'is_taken',
        'is_reserved',
        'fk_for_caffe'

    ];

    public function caffe()
    {
        return $this->belongsTo('App\Models\Caffe','fk_for_caffe','caffe_id');
    }
}
