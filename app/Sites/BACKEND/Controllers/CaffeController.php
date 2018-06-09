<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Caffe;
use Session;

class CaffeController extends Controller
{
    public function index()
    {
        return view('caffe');
    }

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

    public function getCaffes()
    {
        $caffes = Caffe::all();

        return view('caffeList' )->with('caffes', $caffes);
    }

    public function edit($id)
    {
        $caffe = Caffe::find($id);

        return view('caffe-edit' )->withCaffe($caffe);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required'
        ]);

        //Update caffe


        $caffe = Caffe::find($id);
        $caffe->name = $request->input('name');
        $caffe->address = $request->input('address');
        $caffe->city = $request->input('city');
        $caffe->description = $request->input('description');
        $caffe->work_hours = $request->input('work_hours');
        //Save caffe
        $caffe->save();
        Session::flash('success','This caffe was sucesfully saved.');
        //Redirect
        return redirect('/caffe')->with('success', 'Caffe Updated!');
    }
    public function destroy($id)
    {
        $caffe = Caffe::find($id);

        $caffe->delete();
        Session::flash('success','This caffe was successfully deleted.');
        //Redirect
        return redirect('/caffe')->with('success', 'Caffe Deleted!');
    }
}
