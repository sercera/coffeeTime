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
        'type',
        'fk_for_caffe'
    ];

    public function menu()
    {
       return $this->belongsToMany('App\Models\Menu','menu_article', 'article_id', 'menu_id')->withPivot('neto_price', 'selling_price','quantity')->withTimestamps();
    }
    public function caffe(){

        return $this->belongsTo('App\Models\Caffe','caffe_id','fk_for_caffe');
    }

}
