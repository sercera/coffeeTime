<?php

Route::get('/', 'IndexController@index');
Route::get('/users', 'IndexController@users');

//caffe
Route::get('/caffe', 'CaffeController@getCaffes');
Route::get('/caffe/add','CaffeController@index');
Route::post('/caffe/submit','CaffeController@submit');
Route::get('/caffe/edit/{caffe_id}','CaffeController@edit');
Route::resource('caffe', 'CaffeController')->only([
    'update','destroy'
]);

//employee
Route::get('/employees', 'EmployeesController@getEmployees');
Route::get('/employees/add' , 'EmployeesController@index');
Route::post('/employees/submit', 'EmployeesController@submit');
Route::get('/employees/edit/{employees_id}','EmployeesController@edit');
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
Route::get('/table/add','TableController@index');
Route::get('/table','TableController@show');
Route::get('/table/edit/{table_id}','TableController@edit');
Route::post('/table/store','TableController@store');
Route::resource('table', 'TableController')->only([
    'update','destroy'
]);
/** ovo nam ne treba, moze se dobaviti u index funkciji, izbrisan je tablesubmitcontr, dodata funkcija store u TableControlleru,suvisna su dva kontrolelra */
//Route::get('/table', 'TableSubmitController@getCaffes');


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

//Route::resources([
//
//    'caffe' => 'CaffeController'
//
//]);