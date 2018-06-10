<?php

namespace App\Sites\BACKEND\Controllers;

use Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use Validator;


class UsersController extends AuthController
{
    public function index()
    {
        $allUsers = User::all();

        $users = [];
        $numeration = 0;

        foreach ($allUsers as $user) {
            $users[$numeration]['user_id'] = $user->user_id;
            $users[$numeration]['username'] = $user->username;
            $users[$numeration]['email'] = $user->email;
            $users[$numeration]['userDetails'] = $user->getDetails()->first();
            $users[$numeration++]['role'] = Role::where('id', DB::table('role_user')->where('user_id', $user->user_id)->first()->role_id)->first()->display_name;

        }

        return view('users.index', compact('users'));


    }

//$permissions=['create']
    public function create()
    {


        /* if (Auth::user()->hasRole('admin')) {

             $roles = Role::all();
         }elseif(Auth::user()->hasRole('owner')){

             $roles=Role::where('name','!=','admin')->get();
         }else {

             $roles = null;
         }*/
        $roles = Role::all();


        return view('users.create', compact('roles'));

    }

    public function update($user)
    {

        $request=Request::all();


        $request = Request::all();

        $rules = [

            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            //'phone_number' => 'string|min:5',

        ];


        $validation = Validator::make($request, $rules);
        if ($validation->fails()) {

            return redirect()->route('users.create')->withErrors($validation->errors())->withInput();

        }


        DB::table('users')->where('user_id',$user)->update([

            'username' => $request['username'],

        ]);


        DB::table('user_details')->where('fk_for_user',$user)->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'address' => $request['address'],
            'phone_number' => $request['phone_number'],
            'gender' => $request['gender'],
            'age' => $request['age'],
            'pid' => $request['pid'],
            'employee_number' => $request['employee_number'],
            'fk_for_user' => $user

        ]);

        $role = Role::find($request['role']);

        $selectedUser = User::find($user);
        $selectedUser ->detachRoles();
        $selectedUser ->attachRole($role);



        return redirect()->route('users.edit', [$user]);

    }

    public function store()
    {

        $request = Request::all();

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
            'password' => bcrypt($request['password'])

        ]);

        $createdUser = User::where('email', $request['email'])->first();

        DB::table('user_details')->insert([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'address' => $request['address'],
            'phone_number' => $request['phone_number'],
            'gender' => $request['gender'],
            'age' => $request['age'],
            'pid' => $request['pid'],
            'employee_number' => $request['employee_number'],
            'fk_for_user' => $createdUser->user_id

        ]);

        $role = Role::where('id', $request['role'])->first();
        DB::table('role_user')->insert([
            'user_id' => $createdUser->user_id,
            'role_id' => $role->id
        ]);


        return redirect()->route('users.create');
    }

    public function destroy($userId)
    {


        User::where('user_id', $userId)->delete();

        return redirect()->route('users.index');


    }

    public function edit($user)
    {
        $user = User::find($user);


        if (empty($user)) {

            return redirect()->back();


        } else {

            $userDetails = $user->getDetails()->first();

            $numeration = 0;
            $allRoles = Role::where('id', '!=', $user->roles()->first()->id)->get();
            $roles[$numeration++] = Role::find($user->roles()->first()->id);
            foreach ($allRoles as $role) {

                $roles[$numeration++] = $role;
            }

            return view('users.edit', compact('user', 'userDetails', 'roles'));


        }
    }


    public function editPassword($user, $permissions = ['edit'])
    {
        $request = Request::all();


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

        return redirect()->route('users.edit', [$user]);

    }



}
