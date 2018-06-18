<?php

namespace App\Sites\BACKEND\Controllers;

use App\Models\Caffe;
use App\Models\User;
use App\Models\Table;
use Illuminate\Http\Request;
use Session;


class TableController extends AuthController
{
    public function index()
    {

    }

    public function sendRequest(Request $request)
    {

    }

    public function reserve($id)
    {
        $table = Table::find($id);
//
        if($table->is_reserved==false){
            $table->update(['is_reserved' => true]);}
        return redirect()->route('caffe.show', $table->fk_for_caffe)->with('success', 'Uspešno ste rezervisali sto broj ' .$table['table_number'].'.' );
    }
    public function release($id)
    {
        $table = Table::find($id);
//
        if($table->is_reserved==true){
            $table->update(['is_reserved' => false]);}
        return redirect()->route('caffe.show', $table->fk_for_caffe)->with('success', 'Uspešno ste uklonili rezervaciju za sto broj ' .$table['table_number'].'.' );
    }
}
