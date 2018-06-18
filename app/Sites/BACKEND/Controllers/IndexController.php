<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;

class IndexController extends AuthController
{
    public function index($permissions=["view"])
    {
        return view('home');
    }
}