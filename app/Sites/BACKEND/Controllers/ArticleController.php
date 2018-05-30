<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('caffe.article');
    }
}
