<?php

namespace App\Sites\BACKEND\Controllers;

//use Request;
use Illuminate\Http\Request;

use Illuminate\Notifications\Notifiable;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Caffe;
use Storage;
use Validator;
use Image;


class UsersController extends AuthController
{
    public function index($permissions = ["users", "view"])
    {
        $loggedUser = Auth::user();
        $allUsers = null;


        if ($loggedUser->hasRole('admin')) {

            $allUsers = User::all();

        } else if ($loggedUser->hasRole('owner')) {

            $allUsers = User::where('fk_for_caffe', $loggedUser->fk_for_caffe)->get();

        }

        $users = [];
        $numeration = 0;

        foreach ($allUsers as $user) {

            if ($loggedUser->hasRole('owner')) {
                if ($user->hasRole('employee')) {
                    //do-nothing

                } else {

                    continue;
                }
            }

            $users[$numeration]['user_id'] = $user->user_id;
            $users[$numeration]['username'] = $user->username;
            $users[$numeration]['email'] = $user->email;
            $users[$numeration]['caffe'] = !empty($user->fk_for_caffe) ? Caffe::find($user->fk_for_caffe)->name : null;
            $users[$numeration]['userDetails'] = !empty($user->getDetails()->first()) ? $user->getDetails()->first() : null;
            $users[$numeration++]['role'] = Role::where('id', DB::table('role_user')->where('user_id', $user->user_id)->first()->role_id)->first()->display_name;

        }

        return view('users.index', compact('users', 'caffe'));


    }

    public function create($permissions = ["users", "create"])
    {


        if (Auth::user()->hasRole('admin')) {

            $roles = Role::all();
            $caffes = Caffe::all();
        } elseif (Auth::user()->hasRole('owner')) {

            $roles = Role::where('name', '!=', 'admin')->get();
            $caffes = Caffe::where('caffe_id', Auth::user()->fk_for_caffe)->get();
        } else {

            $roles = null;
            $caffes = null;
        }

        return view('users.create', compact('caffes', 'roles'));

    }

    public function update(Request $req, $user, $permissions = ["users", "edit"])
    {

        $request = $req->all();
        $newImage = null;

        $rules = [

            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',

            //'phone_number' => 'string|min:5',

        ];

        $validation = Validator::make($request, $rules);
        if ($validation->fails()) {

            return redirect()->route('users.create')->withErrors($validation->errors())->withInput();

        }

        $oldImage = User::find($user)->getDetails()->first()->image;

        if ($req->hasFile('image')) {
            //add new photo
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/caffe_images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFilename = $oldImage;
            //update the DB
            $newImage = $filename;
            //delete old photo
            Storage::delete($oldFilename);
        }

        DB::table('users')->where('user_id', $user)->update([

            'username' => $request['username'],
            'fk_for_caffe' => $request['caffe'],

        ]);

        DB::table('user_details')->where('fk_for_user', $user)->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'address' => $request['address'],
            'phone_number' => $request['phone_number'],
            'gender' => $request['gender'],
            'age' => $request['age'],
            'pid' => $request['pid'],
            'employee_number' => $request['employee_number'],
            'fk_for_user' => $user,
            'image' => is_null($newImage) ? $oldImage : $newImage

        ]);

        $role = Role::find($request['role']);

        $selectedUser = User::find($user);
        $selectedUser->detachRoles();
        $selectedUser->attachRole($role);


        return redirect()->route('users.edit', [$user])->with('success', 'Uspešno ste izmenili korisnika "' . $request['username'] . '"');

    }

    public function store(Request $req, $permissions = ["users", "edit"])
    {

        $request = $req->all();
        $rules = [

            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            //'phone_number' => 'string|min:5',
            'username' => 'required|string|min:3|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];


        $validation = Validator::make($request, $rules);
        if ($validation->fails()) {

            return redirect()->route('users.create')->withErrors($validation->errors())->withInput();

        }


        DB::table('users')->insert([

            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'fk_for_caffe' => $request['caffe']


        ]);

        $createdUser = User::where('email', $request['email'])->first();

        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/caffe_images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $image = $filename;
        } else {

            $image = "default.jpg";
        }

        DB::table('user_details')->insert([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'address' => $request['address'],
            'phone_number' => $request['phone_number'],
            'gender' => $request['gender'],
            'age' => $request['age'],
            'pid' => $request['pid'],
            'employee_number' => $request['employee_number'],
            'fk_for_user' => $createdUser->user_id,
            'image' => $image

        ]);

        $role = Role::where('id', $request['role'])->first();
        DB::table('role_user')->insert([
            'user_id' => $createdUser->user_id,
            'role_id' => $role->id
        ]);


        return redirect()->route('users.create')->with('success', 'Uspešno ste dodali novog radnika.');
    }

    public function destroy($userId, $permissions = ["users", "delete"])
    {

        $username = User::find($userId)->username;
        User::where('user_id', $userId)->delete();

        return redirect()->back()->with('success', 'Uspešno ste izbrisali korisnika "' . $username . '"');


    }

    public function edit($user, $permissions = ["table", "edit"])
    {
        $selectedUser = User::find($user);


        if (empty($user)) {

            return redirect()->back();


        } else {

            $userDetails = $selectedUser->getDetails()->first();

            $numeration = 0;
            $allRoles = Role::where('id', '!=', $selectedUser->roles()->first()->id)->get();
            $roles[$numeration++] = Role::find($selectedUser->roles()->first()->id);
            foreach ($allRoles as $role) {

                $roles[$numeration++] = $role;
            }

            if(is_null($selectedUser->fk_for_caffe)){
                $caffes=Caffe::all();

            } else {
                $caffe = Caffe::find($selectedUser->fk_for_caffe);
                $i = 0;
                $caffes[$i++] = $caffe;

                if (Auth::user()->hasRole('admin')) {

                    $allCaffes = Caffe::where('caffe_id', '!=', $selectedUser->fk_for_caffe)->get();

                    foreach ($allCaffes as $caffeItem) {

                        $caffes[$i++] = $caffeItem;

                    }

                }
            }
            $user=$selectedUser;

            return view('users.edit', compact('user', 'userDetails', 'roles', 'caffes'));


        }
    }


    public function editPassword(Request $req, $user, $permissions = ["users", "edit"])
    {
        $request = $req->all();


        $rules = [

            'password' => 'required|string|min:6|confirmed'

        ];

        $validation = Validator::make($request, $rules);
        if ($validation->fails()) {

            return redirect()->route('users.edit', [$user])->withErrors($validation->errors())->withInput();

        }


        User::where('user_id', $user)->update([

            'password' => bcrypt($request['password'])

        ]);

        return redirect()->route('users.edit', [$user])->with('success', 'Uspešno ste promenili sifru!');

    }


}
