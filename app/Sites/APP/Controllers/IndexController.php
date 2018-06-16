<?php

namespace App\Sites\APP\Controllers;

use Illuminate\Http\Request;
use App\Models\Caffe;
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

    public function caffe($id)
    {
        $caffe=Caffe::find($id);
        if (empty($caffe)) {

            return redirect()->back();
        }

        return view('caffe-show')->withCaffe($caffe);
    }
}