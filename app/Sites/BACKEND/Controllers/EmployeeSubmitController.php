<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Sites\BACKEND\employees;
use App\Sites\BACKEND\caffe;

class EmployeeSubmitController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
        'username'=>'required',
        'email'=>'required',
        'password'=>'required',
            'fk_for_caffe'=> 'required'
        ]);

        $employee = new employees;
        $employee->username= $request->input('username');
        $employee->email= $request->input('email');
        $employee->password= $request->input('password');
        $employee->fk_for_caffe=  $request->input('fk_for_caffe');
        $employee->save();

        return redirect('/employees')->with('success', 'Employee Submited');
    }
    public function getEmployees()
    {
        $employees = employees::all();

        return view('employeesList')->with('employees', $employees);
    }
    public function getCaffes()
    {
        $caffes = caffe::all();
        return view('caffe.employee')->with('caffes',$caffes);
    }
}
