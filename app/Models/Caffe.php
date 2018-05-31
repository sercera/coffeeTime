<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caffe extends Model
{
    protected $table = 'caffe';
    protected $primaryKey = 'caffe_id';
    protected $fillable = [
        'name',
        'address',
        'city',
        'description',
        'work_hours'
    ];

    public function getEmployees()
    {
        return $this->hasMany('App\Models\Employee', 'employee_id', 'caffe_id');
    }

    public function getTables()
    {
        return $this->hasMany('App\Models\Table', 'table_id', 'caffe_id');
    }

    public function getMenu()
    {
        return $this->hasOne('App\Models\Menu');
    }
}
