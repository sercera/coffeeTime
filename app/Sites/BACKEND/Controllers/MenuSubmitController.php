<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Sites\BACKEND\menu;
use App\Sites\BACKEND\caffe;

class MenuSubmitController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
            'fk_for_caffe'=> 'required'
        ]);

        $menu = new menu;
        $menu->fk_for_caffe=  $request->input('fk_for_caffe');
        $menu->save();

        return redirect('/create_menu')->with('success', 'Menu Submited');
    }
    public function getCaffes()
    {
        $caffes = caffe::all();
        return view('caffe.menu')->with('caffes',$caffes);
    }
}
