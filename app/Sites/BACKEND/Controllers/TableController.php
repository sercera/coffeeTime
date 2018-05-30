<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        return view('caffe.table');
    }
}
