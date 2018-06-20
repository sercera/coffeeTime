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

    public function getUsers()
    {
        return $this->hasMany('App\Models\User', 'fk_for_caffe', 'caffe_id');
    }

    public function tables()
    {
        return $this->hasMany('App\Models\Table', 'table_id', 'caffe_id');
    }

    public function menu()
    {
        return $this->hasOne('App\Models\Menu', 'menu_id' , 'caffe_id');
    }
    public function images()
    {
        return $this->hasMany('App\Models\Images', 'id', 'caffe_id');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'id', 'caffe_id');
    }
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation','reservation_id', 'caffe_id');
    }
}
