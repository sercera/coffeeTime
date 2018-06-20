<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Caffe;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Session;

class PostController extends AuthController
{
    public function index($permissions = ["caffe"])
    {
        $loggedUser=Auth::user();

        if($loggedUser->hasRole('admin')){

            $posts = Post::all();
            $caffes = Caffe::all();

        } else if($loggedUser->hasRole('owner')||$loggedUser->hasRole('employee')){

            $caffes=Caffe::where('caffe_id',$loggedUser->fk_for_caffe)->get();
            $posts=Caffe::find($loggedUser->fk_for_caffe)->posts()->get();

        }

        return view('post.post')->withPosts($posts)->withCaffes($caffes);
    }

    public function submit(Request $request, $permissions=["caffe"])
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->fk_for_caffe = $request->input('fk_for_caffe');
        $post->save();
//        Save post
//        Redirect
        return redirect('post')->with('success', 'Uspešno ste uneli novi post.');
    }

    public function getPosts( $permissions=["caffe"])
    {

        $loggedUser=Auth::user();


        if($loggedUser->hasRole('admin')){

            $posts = Post::all();
            $caffes = Caffe::all();

        } else if($loggedUser->hasRole('owner')||$loggedUser->hasRole('employee')){

            $caffes=Caffe::where('caffe_id',$loggedUser->fk_for_caffe)->get();
            $posts=Caffe::find($loggedUser->fk_for_caffe)->posts()->get();

        }


        return view('post.postList')->withPosts($posts)->withCaffes($caffes);
    }

    public function edit($id, $permissions=["caffe"])
    {

        $post = Post::find($id);

        if (empty($post)) {

            return redirect()->back();
        }
        $caffe = Caffe::find($post->fk_for_caffe);
        return view('post.post-edit')->withPost($post)->withCaffe($caffe);
    }

    public function update(Request $request, $id, $permissions=["caffe"])
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        Session::flash('success', 'This post was successfully saved.');
        ////Redirect
        return redirect('post')->with('success', 'Uspešno ste promenili post.');
    }

    public function destroy($id, $permissions=["caffe","delete"])
    {
        $post = Post::find($id);

        $post->delete();
        Session::flash('success', 'This post was successfully deleted.');
        //Redirect
        return redirect('/post')->with('success', 'Uspešno ste izbrisali izabrani post.');
    }
}
