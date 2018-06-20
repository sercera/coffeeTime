<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTableUser extends Model
{
    protected $table = 'ord_tbl_usr';
    protected $primaryKey = 'ord_tbl_id';
    protected $fillable = [
        'quantity',
        'date',
        'menu_id',
        'order_id',
        'article_id',
        'user_id',
        'employee_id',
    ];

}
