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
//=======
//create menu
Route::get('/create_menu','MenuController@index');
Route::post('/create_menu/submit','MenuSubmitController@submit');
Route::get('/create_menu', 'MenuSubmitController@getCaffes');
//>>>>>>> 5d557d64d44ba44ed70e679fba4df813aeee2c5c

Route::resources([

    'caffe' => 'CaffeController'

]);