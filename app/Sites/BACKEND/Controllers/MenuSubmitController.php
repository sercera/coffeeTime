<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Caffe;
use App\Models\Article;

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
        $articles = Article::all();
        return view('caffe.menu')->withCaffes($caffes)->withArticles($articles);
    }
}
