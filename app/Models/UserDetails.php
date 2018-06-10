<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table='user_details';
    protected $primaryKey='detail_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'address',
        'phone_number',
        'pid',
        'employee_number',
        'fk_for_user',
    ];

    public function userEntity(){

        return $this->belongsTo('App\Models\User','user_id','fk_for_user');


    }

}
