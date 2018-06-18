<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Session;

class ArticleController extends AuthController
{


    public function index($permissions=["article","view"])
    {
        $article= Article::all();
        return view('article.article')->withArticles($article);
    }
    public function submit(Request $request, $permissions=["article","create"])
    {
        $this->validate($request, [
            'name' => 'required',
            'type'=>'required',
            'description' => 'required'
        ]);

        //Create new article

        $article = new Article;
        $article->name = $request->input('name');
        $article->type = $request->input('type');
        $article->description = $request->input('description');

        //Save article
        $article->save();
        //Redirect
        return redirect('/article')->with('success', 'Uspešno ste dodali novi proizvod.');
    }

    public function getArticle($permissions=["article","view"])
    {
        $articles = Article::all();

        return view('article.articleList')->with('articles', $articles);
    }

    public function edit($id)
    {
        $article = Article::find($id, $permissions=["article","edit"]);

        return view('article.article-edit' )->withArticle($article);
    }

    public function update(Request $request,$id,$permissions=["article","edit"])
    {
        $this->validate($request, [
            'name'=>'required',
            'type'=>'required',
            'description'=>'required'
        ]);

        $article = Article::find($id);
        $article->name = $request->input('name');
        $article->type = $request->input('type');
        $article->description = $request->input('description');

        //Save article
        $article->save();

        Session::flash('success','This article was sucesfully saved.');
        //Redirect
        return redirect('/article')->with('success', 'Uspešno ste promenili podatke o proizvodu.');
    }

    public function destroy($id, $permissions=["article","delete"])
    {
        $article = Article::find($id);

        $article->delete();
        Session::flash('success','This article was successfully deleted.');
        //Redirect
        return redirect('/article')->with('success', 'Uspešno ste izbrisali izabrani proizvod.');
    }

}

