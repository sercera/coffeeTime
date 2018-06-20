<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'neto_total',
        'selling_total',
        'is_charged',
        'fk_for_financial',

    ];

    public function financialEntity(){

        return $this->belongsTo('App\Models\Financial','financial_id', 'fk_for_financial');

    }
}
