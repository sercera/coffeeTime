<?php

namespace App\Sites\BACKEND\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Caffe;
use Session;

class EmployeesController extends Controller
{
    public function index(){
        $caffes = Caffe::all();
        return view('employee')->withCaffes($caffes);
    }

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

//    public function getCaffes()
//    {
//        $caffes = Caffe::all();
//        return view('employee')->withCaffes($caffes);
//    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $caffes = Caffe::all();

        return view('employee-edit' )->withEmployee($employee)->withCaffes($caffes);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'fk_for_caffe'=> 'required'
        ]);

        //Update caffe

        $employee = new Employee;
        $employee->username= $request->input('username');
        $employee->email= $request->input('email');
        $employee->password= $request->input('password');
        $employee->fk_for_caffe=  $request->input('fk_for_caffe');

        $employee->save();

        Session::flash('success','This employee was sucesfully saved.');

        return redirect('/employees')->with('success', 'Employee Submitted');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        $employee->delete();
        Session::flash('success','This employee was successfully deleted.');
        //Redirect
        return redirect('/employees')->with('success', 'Employee Deleted!');
    }
}
