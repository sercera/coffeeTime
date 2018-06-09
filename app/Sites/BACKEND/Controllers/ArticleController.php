<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    public function index()
    {
        $article= Article::all();
        return view('article')->withArticles($article);
    }
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

