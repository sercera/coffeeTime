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

        return view('employee-edit' )->withCaffe($employee);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required'
        ]);

        //Update caffe


        $caffe = Caffe::find($id);
        $caffe->name = $request->input('name');
        $caffe->address = $request->input('address');
        $caffe->city = $request->input('city');
        $caffe->description = $request->input('description');
        $caffe->work_hours = $request->input('work_hours');
        //Save caffe
        $caffe->save();
        Session::flash('success','This caffe was sucesfully saved.');
        //Redirect
        return redirect('/caffe')->with('success', 'Caffe Updated!');
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
