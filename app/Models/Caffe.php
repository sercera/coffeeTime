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

    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'employee_id', 'caffe_id');
    }

    public function tables()
    {
        return $this->hasMany('App\Models\Table', 'table_id', 'caffe_id');
    }

    public function menu()
    {
        return $this->hasOne('App\Models\Menu', 'menu_id' , 'caffe_id');
    }
}
