<?php

namespace App\Sites\BACKEND\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Caffe;
use Session;

class CaffeController extends AuthController
{
    public function index()
    {
        return view('caffe.caffe');
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
        return redirect('/caffe')->with('success', 'Uspešno ste dodali novi kafić.');
    }

    public function getCaffes()
    {
        $caffes = Caffe::all();

        return view('caffe.caffeList')->with('caffes', $caffes);
    }

    public function edit($id)
    {
        $caffe = Caffe::find($id);

        if (empty($caffe)) {

            return redirect()->back();
        }

        return view('caffe.caffe-edit')->withCaffe($caffe);
    }

    public function update(Request $request, $id)
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
        Session::flash('success', 'This caffe was sucesfully saved.');
        //Redirect
        return redirect('/caffe')->with('success', 'Uspešno ste promenili podatke o kafiću.');
    }

    public function destroy($id)
    {
        $caffe = Caffe::find($id);

        $caffe->delete();
        Session::flash('success', 'This caffe was successfully deleted.');
        //Redirect
        return redirect('/caffe')->with('success', 'Uspešno ste izbrisali izabrani kafić.');
    }

    public function showEmployees($id)
    {
        $employees = Employee::all();
        $caffe = Caffe::find($id);


        return view('caffe.caffe-employees')->withEmployees($employees)->withCaffe($caffe);
    }

    public function show($id)
    {
        $caffe = Caffe::find($id);

        if (empty($caffe)) {

            return redirect()->back();
        }

        return view('caffe.caffe-show')->withCaffe($caffe);
    }
}
