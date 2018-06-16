<?php

namespace App\Sites\APP\Controllers;

use Illuminate\Http\Request;
use Appgit \Models\Caffe;
class IndexController extends Controller
{
    public function index()
    {
        $caffes = Caffe::all();
        return view('home')->withCaffes($caffes);

    }


    public function users()
    {

        return view('users');


    }


}