<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Caffe;
use App\Models\Table;
use Session;
use Image;
use Storage;

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
            'address' => 'required',
            'image' => 'sometimes|image'
        ]);

        //Create new caffe

        $caffe = new Caffe;
        $caffe->name = $request->input('name');
        $caffe->address = $request->input('address');
        $caffe->city = $request->input('city');
        $caffe->work_hour_from=$request->input('work_hour_from');
        $caffe->work_hour_to=$request->input('work_hour_to');
        $caffe->description = $request->input('description');

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/caffe_images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $caffe->image =$filename;
        }
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
            'address' => 'required',
            'image' => 'sometimes|image'
        ]);

        //Update caffe

        $caffe = Caffe::find($id);
        $caffe->name = $request->input('name');
        $caffe->address = $request->input('address');
        $caffe->city = $request->input('city');
        $caffe->work_hour_from=$request->input('work_hour_from');
        $caffe->work_hour_to=$request->input('work_hour_to');
        $caffe->description = $request->input('description');

        if($request->hasFile('image')){
            //add new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/caffe_images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $oldFilename = $caffe->image;
            //update the DB
            $caffe->image =$filename;
            //delete old photo
            Storage::delete($oldFilename);
        }
        //Save caffe
        $caffe->save();
        Session::flash('success', 'This caffe was sucesfully saved.');
        //Redirect
        return redirect('/caffe')->with('success', 'Uspešno ste promenili podatke o kafiću.');
    }

    public function destroy($id)
    {
        $caffe = Caffe::find($id);
        Storage::delete($caffe->image);
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
        $tables = Table::all();
        $broj_mesta=0;

        foreach($tables as $table) {
            if ($table->fk_for_caffe == $id) {
                if ($table->is_taken == 0 && $table->is_reserved == 0) {
                    $broj_mesta++;
                }
            }
        }
        if (empty($caffe)) {

            return redirect()->back();
        }

        return view('caffe.caffe-show')->withCaffe($caffe)->withTables($tables)->withMesta($broj_mesta);
    }
}
