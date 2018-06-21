<?php
/**
 * Created by PhpStorm.
 * User: New User
 * Date: 14-May-18
 * Time: 10:12 AM
 */

namespace App\Sites\APP\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class AuthController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {

        $this->middleware('auth');
    }




}