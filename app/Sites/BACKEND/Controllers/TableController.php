<?php

namespace App\Sites\BACKEND\Controllers;

use App\Models\Caffe;
use App\Models\Table;
use Illuminate\Http\Request;
use Session;


class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        $caffes = Caffe::all();

        return view('caffe.table')->withTables($tables)->withCaffes($caffes);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'number' => 'required',
            'spots' => 'required'
        ]);


//        DB::table('tables')->insert([
//
//            'table_number' => $request->input['number'],
//            'table_spots' => $request->input['spots'],
//            'fk_for_caffe ' => $request->input['fk_for_caffe']
//
//        ]);

        $table = new Table;
        $table->table_number= $request->input('number');
        $table->table_spots= $request->input('spots');
        $table->fk_for_caffe= $request->input('fk_for_caffe');
        $table->save();
//        Save article
        ////Redirect
        return redirect('table')->with('success', 'Table Submited');
    }
    public function show()
    {
        $tables = Table::all();
        $caffes = Caffe::all();

        return view('caffe.tableList')->withTables($tables)->withCaffes($caffes);
    }
    public function edit($id)
    {
        $table = Table::find($id);
        $caffe = Caffe::find($table->fk_for_caffe);
        return view('table-edit' )->withTable($table)->withCaffe($caffe);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'number' => 'required',
            'spots' => 'required'
        ]);

        $table = Table::find($id);
        $table->table_number= $request->input('number');
        $table->table_spots= $request->input('spots');
        $table->fk_for_caffe= $request->input('fk_for_caffe');
        $table->save();

        Session::flash('success','This article was successfully saved.');
        ////Redirect
        return redirect('table')->with('success', 'Table Updated');
    }
    public function destroy($id)
    {
        $table= Table::find($id);

        $table->delete();
        Session::flash('success','This table was successfully deleted.');
        //Redirect
        return redirect('/table')->with('success', 'Table Deleted!');
    }
}
