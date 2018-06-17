<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Caffe;
use App\Models\Post;
use Session;

class PostController extends AuthController
{
    public function index()
    {
        $posts = Post::all();
        $caffes = Caffe::all();

        return view('post.post')->withPosts($posts)->withCaffes($caffes);
    }

    public function submit(Request $request)
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

    public function getPosts()
    {
        $posts = Post::all();
        $caffes = Caffe::all();

        return view('post.postList')->withPosts($posts)->withCaffes($caffes);
    }

    public function edit($id)
    {

        $post = Post::find($id);

        if (empty($post)) {

            return redirect()->back();
        }
        $caffe = Caffe::find($post->fk_for_caffe);
        return view('post.post-edit')->withPost($post)->withCaffe($caffe);
    }

    public function update(Request $request, $id)
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

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        Session::flash('success', 'This post was successfully deleted.');
        //Redirect
        return redirect('/post')->with('success', 'Uspešno ste izbrisali izabrani post.');
    }
}
