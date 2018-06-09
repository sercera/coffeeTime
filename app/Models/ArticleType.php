<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    protected $table='article_types';
    protected $primaryKey='type_id';
    protected $fillable=[
        'name',
        'fk_for_article'
    ];


    public function articleEntity(){

        $this->belongsTo('App\Models\Article','article_id','fk_for_article');

    }
}
