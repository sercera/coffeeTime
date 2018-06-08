<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Caffe;

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

        $employee = new Employee;
        $employee->username= $request->input('username');
        $employee->email= $request->input('email');
        $employee->password= $request->input('password');
        $employee->fk_for_caffe=  $request->input('fk_for_caffe');
        $employee->save();

        return redirect('/employees')->with('success', 'Employee Submitted');
    }
    public function getEmployees()
    {
        $employees = Employee::all();

        return view('employeesList')->with('employees', $employees);
    }
    public function getCaffes()
    {
        $caffes = Caffe::all();
        return view('caffe.employee')->withCaffes($caffes);
    }
}
