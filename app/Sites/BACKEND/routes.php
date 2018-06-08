<?php

Route::get('/', 'IndexController@index');
Route::get('/users', 'IndexController@users');

//caffe
Route::post('/caffe/submit','CaffeController@submit');
Route::put('/caffe/{caffe_id}','CaffeController@update');
Route::get('/caffe', 'CaffeController@getCaffes');
Route::get('/caffe/eidt/{caffe_id}','CaffeController@edit');
//Route::put('/caffe/{caffe_id}','CaffeController@update');
Route::get('caffe/add','CaffeController@index');


//employee
Route::get('/employees/add' , 'EmployeesController@index');
Route::post('/employees/submit', 'EmployeeSubmitController@submit');
Route::get('/employees', 'EmployeeSubmitController@getEmployees');
Route::get('/employees/add', 'EmployeeSubmitController@getCaffes');

//article
Route::get('/article','ArticleController@index');
Route::post('/article/submit','ArticleSubmitController@submit');

//table
Route::get('/table/add','TableController@index');
Route::get('/table','TableController@show');
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

//Route::resources([
//
//    'caffe' => 'CaffeController'
//
//]);