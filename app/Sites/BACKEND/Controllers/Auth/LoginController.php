<?php

namespace App\Sites\BACKEND\Controllers\Auth;

use App\Models\User;
use App\Sites\BACKEND\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){

        $request=Request::all();

        $login_error = "Username or password is incorrect";

        $user=User::where('username',$request['username'])->first();

        if(empty($user) ){


            $login_error = "Username or password is incorrect";


            return view('auth.login', compact('login_error'));
        }

        if($user->hasRole('user')) {

            $login_error = "Username or password is incorrect";


            return view('auth.login', compact('login_error'));
        }

        $rules = [
            'username' => 'required|string',
            'password' => 'required|string|min:6'


        ];

        $validator = Validator::make($request, $rules);


        if ($validator->fails())
            return redirect()->to('login')->withErrors($validator->errors())->withInput();

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {

            return redirect()->intended();

        } else {

            return view('auth.login', compact('login_error'));


        }



    }

}
