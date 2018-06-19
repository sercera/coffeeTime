<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IndexController extends AuthController
{
    public function index($permissions=["view"])
    {

        if(Auth::user()->hasRole('employee')){

            return redirect()->route('caffe.show',['caffe_id'=> Auth::user()->fk_for_caffe]);

        }
        return view('home');
    }
}