<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Sites\BACKEND\table;

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

        //Save article
        $table->save();
        //Redirect
        return redirect('/article')->with('success', 'Table Submited');
    }
}
