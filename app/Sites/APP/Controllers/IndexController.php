<?php

namespace App\Sites\APP\Controllers;

use Illuminate\Http\Request;
use App\Models\Caffe;
use App\Models\Table;
use App\Models\Post;
use App\Models\Menu;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Role;
use Session;
use Mail;

class IndexController extends AuthController
{
    public function index()
    {
        $caffes= Caffe::all();
        $tables = Table::all();

        return view('home')->withCaffes($caffes);
    }


    public function users()
    {

        return view('users');


    }

    public function caffe($id)
    {
        $caffe=Caffe::find($id);
        $posts=Post::all();
        $menus=Menu::all();
        $users=User::all();
        $roles=Role::all();
        $usersDetails=UserDetails::all();
        $tables = Table::all();
        $broj_mesta=0;
        $ukupan_broj=0;

        foreach($tables as $table) {
            if ($table->fk_for_caffe == $id) {
                if ($table->is_taken == 0 && $table->is_reserved == 0) {
                    $broj_mesta++;
                }
            }
            $ukupan_broj++;
        }
        if (empty($caffe)) {

            return redirect()->back();
        }


        return view('caffe-show')->withCaffe($caffe)->withMesta($broj_mesta)->withPosts($posts)
            ->withMenus($menus)->withUsers($users)->withUsersDetails($usersDetails)->withRoles($roles)->withTables($tables)->withUkupno($ukupan_broj);;
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:10'
        ]);

        $data=array(
            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message
        );

        Mail::send('mail.contact',$data,function($message) use ($data)
        {
            $message->from($data['email']);
            $message->to('stiglo@stiglo.com');
            $message->subject($data['subject']);
        });

        Session::flash('succes','Your email was sent!');

//        return redirect('/')->with('success', 'Uspešno ste poslali mail.');
        return redirect()->back()->with('success', 'Uspešno ste poslali mail.');
    }


}