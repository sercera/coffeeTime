<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
        protected $table="menu";
        protected $primaryKey="menu_id";

    public function caffe()
    {
        return $this->belongsTo('App\Models\Caffe');
    }
    public function article()
    {
        return $this->belongsToMany('App\Models\Article', 'menu_article','menu_id', 'article_id');
    }
}
