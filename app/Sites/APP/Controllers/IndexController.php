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

    public function caffe($id)
    {
        $caffe=Caffe::find($id);
        $tables = Table::all();
        $broj_mesta=0;

        foreach($tables as $table) {
            if ($table->fk_for_caffe == $id) {
                if ($table->is_taken == 0 && $table->is_reserved == 0) {
                    $broj_mesta++;
                }
            }
        }
        if (empty($caffe)) {

            return redirect()->back();
        }

        return view('caffe-show')->withCaffe($caffe)->withMesta($broj_mesta);
    }
}