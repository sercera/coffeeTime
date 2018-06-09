<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Caffe;
use App\Models\Article;

class MenuController extends Controller
{
    public function index()
    {
        $caffes = Caffe::all();
        $articles = Article::all();
        return view('menu')->withCaffes($caffes)->withArticles($articles);
    }
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
}
