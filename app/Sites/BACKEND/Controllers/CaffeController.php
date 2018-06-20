<?php

namespace App\Sites\BACKEND\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Caffe;
use App\Models\Table;
use App\Models\Financial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Image;
use Storage;

class CaffeController extends AuthController
{
    public function index($permissions = ["article", "view"])
    {
        return view('caffe.caffe');
    }

    public function submit(Request $request, $permissions = ["caffe", "create"])
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
        $caffe->short_description = $request->input('short_description');
        $caffe->call_number = $request->input('call_number');
        $caffe->www = $request->input('www');
        $caffe->work_hour_from = $request->input('work_hour_from');
        $caffe->work_hour_to = $request->input('work_hour_to');
        $caffe->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/caffe_images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $caffe->image = $filename;
        } else {

            $caffe->image = "default.jpg";
        }
        //Save caffe
        $caffe->save();


        /*  $financial= new Financial();


          $financial->date=Carbon::now();
          $financial->fk_for_caffe=Carbon::now();*/


        //Redirect
        return redirect('/caffe')->with('success', 'Uspešno ste dodali novi kafić.');
    }

    public function getCaffes($permissions = ["article", "view"])
    {
        $loggedUser = Auth::user();

        if ($loggedUser->hasRole('admin')) {

            $caffes = Caffe::all();
            $employees = User::all();

        } else if ($loggedUser->hasRole('owner')) {

            $caffes = Caffe::where('caffe_id', $loggedUser->fk_for_caffe)->get();
        } else {
            $caffes = null;

        }


        return view('caffe.caffeList')->with('caffes', $caffes);
    }

    public function edit($id, $permissions = ["article", "edit"])
    {
        $caffe = Caffe::find($id);

        if (empty($caffe)) {

            return redirect()->back();
        }

        return view('caffe.caffe-edit')->withCaffe($caffe);
    }

    public function update(Request $request, $id, $permissions = ["article", "edit"])
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
        $caffe->short_description = $request->input('short_description');
        $caffe->call_number = $request->input('call_number');
        $caffe->city = $request->input('city');
        $caffe->www = $request->input('www');
        $caffe->work_hour_from = $request->input('work_hour_from');
        $caffe->work_hour_to = $request->input('work_hour_to');
        $caffe->description = $request->input('description');

        if ($request->hasFile('image')) {
            //add new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/caffe_images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFilename = $caffe->image;
            //update the DB
            $caffe->image = $filename;
            //delete old photo
            Storage::delete($oldFilename);
        }
        //Save caffe
        $caffe->save();
        Session::flash('success', 'This caffe was sucesfully saved.');
        //Redirect
        return redirect('/caffe')->with('success', 'Uspešno ste promenili podatke o kafiću.');
    }

    public function destroy($id, $permissions = ["article", "delete"])
    {
        $caffe = Caffe::find($id);
        Storage::delete($caffe->image);
        $caffe->delete();
        Session::flash('success', 'This caffe was successfully deleted.');
        //Redirect
        return redirect('/caffe')->with('success', 'Uspešno ste izbrisali izabrani kafić.');
    }

    public function showEmployees($id, $permissions = ["users", "view"])
    {


        $caffe = Caffe::find($id);
        if (empty($caffe) || Auth::user()->hasRole('employee')) {

            return redirect()->back();

        }
        if (Auth::user()->hasRole('owner') && Auth::user()->fk_for_caffe !== $id) {

            return redirect()->back();

        }

        $employees = $caffe->getUsers()->get();


        return view('caffe.caffe-employees')->withEmployees($employees)->withCaffe($caffe);
    }

    public function show($id, $permissions = ["caffe", "view"])
    {

        $caffe = Caffe::find($id);
        if (empty($caffe)) {

            return redirect()->back();
        }
        $i = 0;
        $tables = [];
        $allTables = Table::where('fk_for_caffe', $id)->get();


        foreach ($allTables as $table) {
            $tables[$i]['table_id'] = $table->table_id;
            $tables[$i]['table_number'] = $table->table_number;
            $tables[$i]['table_spots'] = $table->table_spots;
            $tables[$i]['caffe'] = Caffe::find($table->fk_for_caffe)->name;
            $tables[$i]['is_taken'] = $table->is_taken;
            $tables[$i++]['is_reserved'] = $table->is_reserved;


        }

        $broj_mesta = 0;
        foreach ($tables as $table) {
            if (!$table['is_taken'] && !$table['is_reserved']) {

                $broj_mesta++;
            }

        }

        return view('caffe.caffe-show', compact('caffe', 'tables', 'broj_mesta'));
    }
}
