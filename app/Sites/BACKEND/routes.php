<?php

Route::get('/', 'IndexController@index');
Route::get('/users', 'IndexController@users');

//caffe
Route::get('/caffe', 'CaffeController@getCaffes');
Route::get('/caffe/add','CaffeController@index');
Route::post('/caffe/submit','CaffeController@submit');
Route::get('/caffe/edit/{caffe_id}','CaffeController@edit');
Route::get('/caffe/employees/{caffe_id}','CaffeController@showEmployees');
Route::resource('caffe', 'CaffeController')->only([
    'update','destroy'
]);

//employee
Route::get('/employees', 'EmployeesController@getEmployees');
Route::get('/employees/add' , 'EmployeesController@index');
Route::post('/employees/submit', 'EmployeesController@submit');
Route::get('/employees/edit/{employee_id}','EmployeesController@edit');
Route::resource('employees', 'EmployeesController')->only([
    'update','destroy'
]);

//article
Route::get('/article','ArticleController@index');
Route::get('/article/edit/{article_id}','ArticleController@edit');
Route::post('/article/submit','ArticleController@submit');
Route::resource('article', 'ArticleController')->only([
    'update','destroy'
]);

//table
Route::get('/table','TableController@getTables');
Route::get('/table/add','TableController@index');
Route::post('/table/submit','TableController@submit');
Route::get('/table/edit/{table_id}','TableController@edit');
Route::resource('table', 'TableController')->only([
    'update','destroy'
]);

//article
Route::get('/article', 'ArticleController@getArticle');
Route::get('/article/add','ArticleController@index');
Route::post('/article/submit','ArticleController@submit');
Route::get('/article/edit/{article_id}','ArticleController@edit');
Route::resource('article','ArticleController')->only([
   'update','destroy'
]);


//create menu
Route::get('/menu/create','MenuController@index');
Route::post('/menu/submit','MenuController@submit');
Route::delete('/menu/delete_article/{menu_id}/{article_id}','MenuController@removeFromMenu');
Route::post('/menu/add_article','MenuController@addArticle');
Route::get('/menu/edit/{menu_id}','MenuController@edit');
Route::get('/menu','MenuController@list');
Route::resource('menu', 'MenuController')->only([
    'update','destroy', 'show'

]);
