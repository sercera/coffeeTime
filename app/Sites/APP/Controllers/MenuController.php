<?php

namespace App\Sites\APP\Controllers;

use Illuminate\Http\Request;
use App\Sites\APP\Controllers\Auth;
use App\Models\Menu;
use App\Models\Article;
use App\Models\Caffe;
use App\Models\Order;


class MenuController extends AuthController
{
    public function index($id)
    {
        $menu = Menu::find($id);


        $articles=Caffe::find($menu->fk_for_caffe)->articles()->get();

        if(empty($articles)){

            $articles=null;
        }

        return view('caffe-show')->withMenu($menu)->withArticles($articles);
    }
}
