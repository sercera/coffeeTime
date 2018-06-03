<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;

class MenuArticleController extends Controller
{
    public function index()
    {
        return view('caffe.menu_article');
    }
}
