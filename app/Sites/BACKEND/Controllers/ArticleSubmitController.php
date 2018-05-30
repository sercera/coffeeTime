<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Sites\BACKEND\article;

class ArticleSubmitController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type'=>'required',
            'description' => 'required'
        ]);

        //Create new article

        $article = new article;
        $article->name = $request->input('name');
        $article->type = $request->input('type');
        $article->description = $request->input('description');

        //Save article
        $article->save();
        //Redirect
        return redirect('/article')->with('success', 'Article Submited');
    }

}
