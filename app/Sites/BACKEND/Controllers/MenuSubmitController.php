<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Caffe;

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
        $caffes = Caffe::all();
        return view('caffe.menu')->with('caffes',$caffes);
    }
}
