<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    public function index()
    {
        $article= Article::all();
        return view('caffe.article')->withArticles($article);
    }
}

