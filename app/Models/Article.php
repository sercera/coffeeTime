<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='articles';
    protected $primaryKey='article_id';
    protected $fillable=[
        'name',
        'description',
        'type'
    ];

}
