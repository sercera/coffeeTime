<?php
/**
 * Created by PhpStorm.
 * User: vitko
 * Date: 5/5/18
 * Time: 2:26 PM
 */

namespace App\Sites\APP\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LogoutController extends AuthController
{

    use AuthenticatesUsers;

    public function logout(){

        Auth::logout();
        Session::flush();

        return redirect('/');


    }

}