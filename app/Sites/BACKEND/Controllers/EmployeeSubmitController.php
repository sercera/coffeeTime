<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Sites\BACKEND\employees;

class EmployeeSubmitController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
        'username'=>'required',
        'email'=>'required',
        'password'=>'required'
        ]);

        $employee = new employees;
        $employee->username= $request->input('username');
        $employee->email= $request->input('email');
        $employee->password= $request->input('password');
        $employee->fk_for_caffe= 1;
        $employee->save();

        return redirect('/')->with('sucess', 'Employee Submited');
    }
    public function getEmployees(){
        $employees = employees::all();

        return view('employeesList')->with('employees', $employees);
    }
}
