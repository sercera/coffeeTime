<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;

class CaffeController extends Controller
{
    public function index(){

        return view('caffe.caffe');


    }
}
