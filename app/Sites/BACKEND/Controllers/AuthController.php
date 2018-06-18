<?php

namespace App\Sites\BACKEND\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     public function __construct(){

         $this->middleware('auth');
     }

     public function callAction($method, $parameters)
     {


         $permissions = end($parameters);

         foreach ($permissions as $permission)
         if ( Auth::user()->can($permission)) {

             return parent::callAction($method, $parameters);
         }
         return redirect('403');


     }


}