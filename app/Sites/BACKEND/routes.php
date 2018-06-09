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
Route::get('/create_menu','MenuController@index');
Route::post('/create_menu/submit','MenuController@submit');
//>>>>>>> 5d557d64d44ba44ed70e679fba4df813aeee2c5c

