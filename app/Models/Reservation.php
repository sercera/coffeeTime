<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'reservation_id';

    public function table(){
        return $this->belongsTo('App\Models\Table', 'fk_for_table' , 'table_id');
    }
    public function caffe(){
        return $this->belongsTo('App\Models\Caffe', 'fk_for_caffe', 'caffe_id');
    }
}
