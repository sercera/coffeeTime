<?php

namespace App\Sites\BACKEND\Controllers;

use App\Models\Caffe;
use App\Models\Table;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;


class TableController extends AuthController
{
    public function index($permissions = ["table", "view"])
    {
        $loggedUser = Auth::user();

        if ($loggedUser->hasRole('admin')) {

            $tables = Table::all();
            $caffes = Caffe::all();

        } else if ($loggedUser->hasRole('owner')) {

            $tables = Table::where('fk_for_caffe', $loggedUser->fk_for_caffe)->get();
            $caffes = Caffe::where('caffe_id', $loggedUser->fk_for_caffe)->get();
        }

        return view('table.table')->withTables($tables)->withCaffes($caffes);
    }

    public function submit(Request $request, $permissions = ["table", "create"])
    {

        $this->validate($request, [
            'number' => 'required',
            'spots' => 'required'
        ]);

        $table = new Table;
        $table->table_number = $request->input('number');
        $table->table_spots = $request->input('spots');
        $table->fk_for_caffe = $request->input('fk_for_caffe');
        $table->save();
//        Save article
        ////Redirect
        return redirect('table')->with('success', 'Uspešno ste uneli novi sto.');
    }

    public function getTables($permissions = ["table", "view"])
    {

        $loggedUser = Auth::user();
        $allTables=[];
        $i = 0;

        if ($loggedUser->hasRole('admin')) {

            $allTables = Table::all();


        } else if ($loggedUser->hasRole('owner') || $loggedUser->hasRole('employee')) {

            $allTables = Table::where('fk_for_caffe', $loggedUser->fk_for_caffe)->get();


        }

            foreach ($allTables as $table) {
                $tables[$i]['table_id'] = $table->table_id;
                $tables[$i]['table_number'] = $table->table_number;
                $tables[$i]['table_spots'] = $table->table_spots;
                $tables[$i]['caffe'] = Caffe::find($table->fk_for_caffe)->name;
                $tables[$i]['is_taken'] = $table->is_taken;
                $tables[$i++]['is_reserved'] = $table->is_reserved;


            }



        return view('table.tableList', compact('tables'));
    }

    public function edit($id, $permissions = ["table", "edit"])
    {

        $table = Table::find($id);

        if (empty($table)) {

            return redirect()->back();
        }
        $caffe = Caffe::find($table->fk_for_caffe);
        return view('table.table-edit')->withTable($table)->withCaffe($caffe);
    }

    public function update(Request $request, $id, $permissions = ["table", "edit"])
    {
        $this->validate($request, [
            'number' => 'required',
            'spots' => 'required'
        ]);

        $table = Table::find($id);
        $table->table_number = $request->input('number');
        $table->table_spots = $request->input('spots');
        $table->fk_for_caffe = $request->input('fk_for_caffe');
        $table->save();

        Session::flash('success', 'This article was successfully saved.');
        ////Redirect
        return redirect('table')->with('success', 'Uspešno ste promenili podatke o stolu.');
    }

    public function reserve($id, $permissions = ["table"])
    {
        $table = Table::find($id);
//
        if ($table->is_reserved == false) {
            $table->update(['is_reserved' => true]);
        }
        return redirect()->route('caffe.show', $table->fk_for_caffe)->with('success', 'Uspešno ste rezervisali sto broj ' . $table['table_number'] . '.');
    }

    public function release($id, $permissions = ["table"])
    {
        $table = Table::find($id);
//
        if ($table->is_reserved == true) {
            $table->update(['is_reserved' => false]);
        }
        return redirect()->route('caffe.show', $table->fk_for_caffe)->with('success', 'Uspešno ste uklonili rezervaciju za sto broj ' . $table['table_number'] . '.');
    }

    public function destroy($id, $permissions = ["table", "delete"])
    {
        $table = Table::find($id);

        $table->delete();
        Session::flash('success', 'This table was successfully deleted.');
        //Redirect
        return redirect('/table')->with('success', 'Uspešno ste izbrisali izabrani sto.');
    }
}
