<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        return view('welcome');

    }


    public function users()
    {

        return view('users');


    }


}