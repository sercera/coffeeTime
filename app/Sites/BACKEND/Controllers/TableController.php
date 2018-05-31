<?php

namespace App\Sites\BACKEND\Controllers;

use App\Models\Caffe;
use App\Models\Table;
use Request;
use DB;


class TableController extends Controller
{
    public function index()
    {
        $caffes = Caffe::all();


        return view('caffe.table', compact('caffes'));
    }

    public function store()
    {
        $request = Request::all();


        $this->validate($request, [
            'number' => 'required',
            'spots' => 'required'
        ]);

        //Create new article

        DB::table('tables')->insert([

            'table_number' => $request['number'],
            'table_spots' => $request->input['spots'],
            'fk_for_caffe ' => $request['fk_for_caffe']

        ]);

        //Save article
        ////Redirect
        return redirect('table')->with('success', 'Table Submited');
    }
}
