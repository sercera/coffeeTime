<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('caffe.menu');
    }
}
