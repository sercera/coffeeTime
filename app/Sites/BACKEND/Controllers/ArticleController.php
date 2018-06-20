<?php

namespace App\Sites\BACKEND\Controllers;

use App\Models\Caffe;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

use Session;

class ArticleController extends AuthController
{


    public function index($permissions = ["article", "create"])
    {

        $loggedUser = Auth::user();

        if ($loggedUser->hasRole('admin')) {

            $caffes = Caffe::all();


        } else if ($loggedUser->hasRole('owner') || $loggedUser->hasRole('employee')) {

            $caffes = Caffe::where('caffe_id', $loggedUser->fk_for_caffe)->get();

        }

        return view('article.article', compact('caffes'));
    }

    public function submit(Request $request, $permissions = ["article", "create"])
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);

        //Create new article

        $article = new Article;
        $article->name = $request->input('name');
        $article->type = $request->input('type');
        $article->description = $request->input('description');
        $article->fk_for_caffe = $request->input('caffe');

        //Save article
        $article->save();
        //Redirect
        return redirect('/article')->with('success', 'Uspešno ste dodali novi proizvod.');
    }

    public function getArticles($permissions = ["article", "view"])
    {
        $loggedUser = Auth::user();

        if ($loggedUser->hasRole('admin')) {

            $selectedArticles = Article::all();


        } else if ($loggedUser->hasRole('owner') || $loggedUser->hasRole('employee')) {

            $selectedArticles = Caffe::find($loggedUser->fk_for_caffe)->articles()->get();
           // $caffes = Caffe::where('caffe_id', $loggedUser->fk_for_caffe)->first()->name;


        }
        $numeration=0;
        foreach ($selectedArticles as $selectedArticle){

            $articles[$numeration]['article']=$selectedArticle;
            $articles[$numeration++]['caffe']=Caffe::find($selectedArticle->fk_for_caffe)->name;

        }


        return view('article.articleList', compact('articles'));
    }

    public function edit($id, $permissions = ["article", "edit"])
    {
        $article = Article::find($id);
        $loggedUser = Auth::user();

        if (empty($article) || !(Auth::user()->hasRole('admin') || Auth::user()->hasRole('owner'))) {

            return redirect()->back();
        }
        $numeration = 0;
        if ($loggedUser->hasRole('admin')) {


            $caffes[$numeration++] = Caffe::find($article->fk_for_caffe);

            $someCaffes = Caffe::where('caffe_id', '!=', $loggedUser->fk_for_caffe)->get();
            foreach ($someCaffes as $someCaffe) {

                $caffes[$numeration++] = $someCaffe;
            }

        } else if ($loggedUser->hasRole('owner') || $loggedUser->hasRole('employee')) {

            $caffes = Caffe::where('caffe_id', $loggedUser->fk_for_caffe)->get();

        }

        return view('article.article-edit', compact('article', 'caffes'));
    }

    public function update(Request $request, $id, $permissions = ["article", "edit"])
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);

        $article = Article::find($id);
        $article->name = $request->input('name');
        $article->type = $request->input('type');
        $article->description = $request->input('description');

        //Save article
        $article->save();

        Session::flash('success', 'This article was sucesfully saved.');
        //Redirect
        return redirect('/article')->with('success', 'Uspešno ste promenili podatke o proizvodu.');
    }

    public function destroy($id, $permissions = ["article", "delete"])
    {
        $article = Article::find($id);

        if (empty($article) || !(Auth::user()->hasRole('admin') || Auth::user()->hasRole('owner'))) {

            return redirect()->back();
        }

        $article->delete();
        Session::flash('success', 'This article was successfully deleted.');
        //Redirect
        return redirect('/article')->with('success', 'Uspešno ste izbrisali izabrani proizvod.');
    }

}

