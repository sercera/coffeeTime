<?php
Route::get('/', 'IndexController@index');
Route::get('users', 'IndexController@users');
Route::get('/employees' , 'EmployeesController@index');
Route::post('/employees/submit', 'EmployeeSubmitController@submit');
Route::get('/employeesList', 'EmployeeSubmitController@getEmployees');

Route::resources([

    'caffe' => 'CaffeController'

]);