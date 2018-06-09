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

<<<<<<< HEAD



//article
Route::get('/article','ArticleController@index');
Route::get('/article/edit/{article_id}','ArticleController@edit');
Route::post('/article/submit','ArticleController@submit');
Route::resource('article', 'ArticleController')->only([
    'update','destroy'
]);

=======
>>>>>>> a17a0dfa9e33ffca7e5ef4c7bf817591f36b737b
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



//menu
//Route::get('/menu/{id}', 'MenuArticleController@index');
//Route::post('/menu/submit','MenuArticleSubmitController@submit');
//Route::get('/menu', 'MenuArticleController@getArticles');
//=======
//create menu
Route::get('/menu/create','MenuController@index');
Route::post('/menu/submit','MenuController@submit');
Route::get('/menu/edit/{menu_id}','MenuController@edit');
Route::get('/menu','MenuController@list');
Route::resource('menu', 'MenuController')->only([
    'update','destroy', 'show'
]);
//>>>>>>> 5d557d64d44ba44ed70e679fba4df813aeee2c5c

<<<<<<< HEAD
//Route::resources([
//
//    'caffe' => 'CaffeController'
//
//]);
=======
>>>>>>> a17a0dfa9e33ffca7e5ef4c7bf817591f36b737b
