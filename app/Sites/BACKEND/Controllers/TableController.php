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

        return view('table.table')->withTables($tables)->withCaffes($caffes);
    }

    public function submit(Request $request)
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
        return redirect('table')->with('success', 'Uspešno ste uneli novi sto.');
    }
    public function getTables()
    {
        $tables = Table::all();
        $caffes = Caffe::all();

        return view('table.tableList')->withTables($tables)->withCaffes($caffes);
    }
    public function edit($id)
    {
        $table = Table::find($id);
        $caffe = Caffe::find($table->fk_for_caffe);
        return view('table.table-edit' )->withTable($table)->withCaffe($caffe);
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
        return redirect('table')->with('success', 'Uspešno ste promenili podatke o stolu.');
    }
    public function destroy($id)
    {
        $table= Table::find($id);

        $table->delete();
        Session::flash('success','This table was successfully deleted.');
        //Redirect
        return redirect('/table')->with('success', 'Uspešno ste izbrisali izabrani sto.');
    }
}
