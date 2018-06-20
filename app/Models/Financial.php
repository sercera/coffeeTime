<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $table = 'financials';
    protected $primaryKey = 'financial_id';
    protected $fillable = [
        'date',
        'neto_value',
        'bruto_value',
        'pdv',
        'fk_for_caffe',

    ];

    public function caffeEntity(){

        return $this->belongsTo('App\Models\Caffe','caffe_id', 'fk_for_caffe');

    }
    public function getOrders(){

        return $this->hasMany('App\Models\Order','fk_for_financial', 'financial_id');


    }
}
