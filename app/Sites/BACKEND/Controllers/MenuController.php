<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Caffe;
use App\Models\Article;

class MenuController extends Controller
{
    public function index()
    {
        return view('caffe.menu');
    }
}
