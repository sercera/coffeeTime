<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        return view('caffe.employee');
    }
}
