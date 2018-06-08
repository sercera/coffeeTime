<?php

Route::get('/', 'IndexController@index');
Route::get('/users', 'IndexController@users');

//caffe
Route::post('/caffe/add','CaffeController@submit');
Route::get('/caffeList', 'CaffeController@getCaffes');

//employee
Route::get('/employees' , 'EmployeesController@index');
Route::post('/employees/submit', 'EmployeeSubmitController@submit');
Route::get('/employeesList', 'EmployeeSubmitController@getEmployees');
Route::post('/employees', 'EmployeeSubmitController@getCaffes');

//article
Route::get('/article','ArticleController@index');
Route::post('/article/submit','ArticleSubmitController@submit');

//table
Route::get('/table/add','TableController@index');
Route::post('/table','TableController@store');
/** ovo nam ne treba, moze se dobaviti u index funkciji, izbrisan je tablesubmitcontr, dodata funkcija store u TableControlleru,suvisna su dva kontrolelra */
//Route::get('/table', 'TableSubmitController@getCaffes');


//menu
Route::get('/menu/{id}', 'MenuArticleController@index');
Route::post('/menu/submit','MenuArticleSubmitController@submit');
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