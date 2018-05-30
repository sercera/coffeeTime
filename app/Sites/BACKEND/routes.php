<?php

Route::get('/', 'IndexController@index');
Route::get('/users', 'IndexController@users');

//caffe
Route::post('/caffe/submit','caffeSubmitController@submit');
Route::get('/caffeList', 'caffeSubmitController@getCaffes');

//employee
Route::get('/employees' , 'EmployeesController@index');
Route::post('/employees/submit', 'EmployeeSubmitController@submit');
Route::get('/employeesList', 'EmployeeSubmitController@getEmployees');
Route::get('/employees', 'EmployeeSubmitController@getCaffes');

//article
Route::get('/article','ArticleController@index');
Route::post('/article/submit','ArticleSubmitController@submit');

//table
Route::get('/table','TableController@index');
Route::post('/table/submit','TableSubmitController@submit');
Route::get('/table', 'TableSubmitController@getCaffes');

//menu
Route::get('/menu', 'MenuArticleController@index');
Route::get('/menu', 'MenuArticleController@getArticles');

Route::resources([

    'caffe' => 'CaffeController'

]);