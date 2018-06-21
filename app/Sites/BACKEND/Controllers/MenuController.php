<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Caffe;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

use Session;
use Image;

class MenuController extends AuthController
{
    public function index($permissions = ["caffe", "view"])
    {
        if (Auth::user()->hasRole('admin')) {

            $caffes = Caffe::all();

        } else if (Auth::user()->hasRole('owner') || Auth::user()->hasRole('employee')) {

            $caffes = Caffe::where('caffe_id', Auth::user()->fk_for_caffe)->get();

        }

        if (empty($caffes)) {

            $caffes = null;

        }


        $articles = Article::all();
        return view('menu.menu')->withCaffes($caffes)->withArticles($articles);
    }

    public function submit(Request $request, $permissions = ["caffe", "edit"])
    {
//        $this->validate($request, [
//            'fk_for_caffe'=> 'required'
//        ]);
//        dd($request);
//        dd($request->input('article_number'));
        $menu = new Menu;
        $menu->fk_for_caffe = $request->input('fk_for_caffe');
        $menu->name = $request->input('name');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/caffe_images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $menu->image = $filename;
        } else {

            $menu->image = "default.jpg";
        }
        $menu->save();

//        $menu->article()->attach($request->input('article_number'),['neto_price' => $request->input('neto_price'),
//            'selling_price' => $request->input('selling_price'),
//            'quantity' => $request->input('quantity'),
//            'article_id' => $request->input('article_number'),
//            'menu_id' => $menu->menu_id,
//            ]);

        return redirect('/menu')->with('success', 'Uspešno ste dodali novi meni.');
    }

    public function addArticle(Request $request, $permissions = ["caffe", "edit"])
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

    public function removeFromMenu($meni, $arti, $permissions = ["caffe", "edit"])
    {
        $menu = Menu::find($meni);

        $menu->article()->detach($arti);

        return redirect()->route('menu.show', $menu->menu_id)->with('success', 'Article Removed');
    }

    public function updateMenu(Request $request, $permissions = ["caffe", "edit"])
    {
        $menu = Menu::findOrFail($request->meni);

        $menu->article()->detach($request->article_num);
        $menu->article()->attach($request->input('article_num'), ['neto_price' => $request->input('neto_price'),
            'selling_price' => $request->input('selling_price'),
            'quantity' => $request->input('quantity'),
            'article_id' => $request->input('article_num'),
            'menu_id' => $menu->menu_id,
        ]);
        return back();
    }

    public function list($permissions = ["caffe", "view"])
    {
        $tempMenu=null;

        if (Auth::user()->hasRole('admin')) {

            $menus = Menu::all();

        } else if (Auth::user()->hasRole('owner') || Auth::user()->hasRole('employee')) {

            $menus = Menu::where('fk_for_caffe', Auth::user()->fk_for_caffe)->get();

        }

        $i = 0;
        if (empty($menus)) {

            $menus = null;

        } else {
            foreach ($menus as $menu) {

                $tempMenu[$i]['menu'] = $menu;
                $tempMenu[$i++]['caffe'] = Caffe::find($menu->fk_for_caffe)->name;

            }
            $menus=$tempMenu;
        }

        return view('menu.menuList')->withMenus($menus);
    }

    public
    function show($id, $permissions = ["caffe", "view"])
    {

        $menu = Menu::find($id);

        if (empty($menu)) {

            return redirect()->back();
        }

        $caffe=Caffe::find($menu->fk_for_caffe);

        $articles = Caffe::find($menu->fk_for_caffe)->articles()->get();

        if (empty($articles)) {

            $articles = null;
        }


        return view('menu.menu-show',compact('caffe'))->withMenu($menu)->withArticles($articles);
    }

    public
    function destroy($id, $permissions = ["caffe", "delete"])
    {
        $menu = Menu::find($id);
        $menu->article()->detach();

        $menu->delete();
        Session::flash('success', 'This menu was successfully deleted.');
        //Redirect
        return redirect('/menu')->with('success', 'Uspešno ste izbrisali izabrani meni.');
    }
}