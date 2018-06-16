<?php

namespace App\Sites\APP\Controllers;

use Illuminate\Http\Request;
use App\Models\Caffe;
use App\Models\Table;

class IndexController extends Controller
{
    public function index()
    {
        $caffes= Caffe::all();
        $tables = Table::all();

        return view('home')->withCaffes($caffes);
    }


    public function users()
    {

        return view('users');


    }


}