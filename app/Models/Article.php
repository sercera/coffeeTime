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

    public function menu()
    {
        $this->belongsToMany('App\Models\Menu','menu_article', 'article_id', 'menu_id')->withPivot('neto_price', 'selling_price','quantity')->withTimestamps();
    }

    public function getType(){


        $this->hasOne('App\Models\ArticleType','fk_for_article','article_id');

    }
}
