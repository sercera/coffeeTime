<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Caffe;
use App\Models\Article;
use Session;

class MenuController extends AuthController
{
    public function index()
    {
        $caffes = Caffe::all();
        $articles = Article::all();
        return view('menu.menu')->withCaffes($caffes)->withArticles($articles);
    }

    public function submit(Request $request)
    {
//        $this->validate($request, [
//            'fk_for_caffe'=> 'required'
//        ]);
//        dd($request);
//        dd($request->input('article_number'));
        $menu = new Menu;
        $menu->fk_for_caffe = $request->input('fk_for_caffe');
        $menu->save();

//        $menu->article()->attach($request->input('article_number'),['neto_price' => $request->input('neto_price'),
//            'selling_price' => $request->input('selling_price'),
//            'quantity' => $request->input('quantity'),
//            'article_id' => $request->input('article_number'),
//            'menu_id' => $menu->menu_id,
//            ]);

        return redirect('/menu')->with('success', 'Uspešno ste dodali novi meni.');
    }

    public function addArticle(Request $request)
    {
        $menu = Menu::find($request->input('meni_id'));

        $menu->article()->attach($request->input('article_number'), ['neto_price' => $request->input('neto_price'),
            'selling_price' => $request->input('selling_price'),
            'quantity' => $request->input('quantity'),
            'article_id' => $request->input('article_number'),
            'menu_id' => $menu->menu_id,
        ]);
        return redirect()->route('menu.show', $menu->menu_id)->with('success', 'Uspešno ste dodali novi proizvod.');
    }

    public function removeFromMenu($meni, $arti)
    {
        $menu = Menu::find($meni);

        $menu->article()->detach($arti);

        return redirect()->route('menu.show', $menu->menu_id)->with('success', 'Article Removed');
    }

    public function list()
    {
        $menus = Menu::all();
        return view('menu.menuList')->withMenus($menus);
    }

    public function show($id)
    {
        $menu = Menu::find($id);

        if (empty($menu)) {

            return redirect()->back();
        }
        $articles = Article::all();

        return view('menu.menu-show')->withMenu($menu)->withArticles($articles);
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);

        $menu->delete();
        Session::flash('success', 'This menu was successfully deleted.');
        //Redirect
        return redirect('/menu')->with('success', 'Uspešno ste izbrisali izabrani meni.');
    }
}