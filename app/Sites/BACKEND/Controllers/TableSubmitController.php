<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Sites\BACKEND\table;
use App\Sites\BACKEND\caffe;

class TableSubmitController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
            'number' => 'required',
            'spots'=>'required'
        ]);

        //Create new article

        $table = new table;
        $table->table_number = $request->input('number');
        $table->table_spots = $request->input('spots');
        $table->fk_for_caffe = $request->input('fk_for_caffe');

        //Save article
        $table->save();
        //Redirect
        return redirect('/table')->with('success', 'Table Submited');
    }
    public function getCaffes()
    {
        $caffes = caffe::all();
        return view('caffe.table')->with('caffes',$caffes);
    }

}
