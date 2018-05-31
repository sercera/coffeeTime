<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Caffe;

class caffeSubmitController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required'
        ]);

        //Create new caffe

        $caffe = new Caffe;
        $caffe->name = $request->input('name');
        $caffe->address = $request->input('address');
        $caffe->city = $request->input('city');
        $caffe->description = $request->input('description');
        $caffe->work_hours = $request->input('work_hours');
        //Save caffe
        $caffe->save();
        //Redirect
        return redirect('/caffe')->with('success', 'Caffe Submited');
    }
    public function getCaffes(){
        $caffes = Caffe::all();

        return view('caffeList' )->with('caffes', $caffes);
    }
}