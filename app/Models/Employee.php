<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends Authenticatable
{
    protected $table='employees';
    protected $primaryKey='employee_id';

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function caffe()
    {
        return $this->belongsTo('App\Models\Caffe', 'fk_for_caffe','caffe_id');
    }
}
