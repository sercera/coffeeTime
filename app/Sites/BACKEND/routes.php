<?php
Route::get('/', 'IndexController@index');
Route::get('users', 'IndexController@users');
Route::post('/caffe/submit', 'caffeSubmitController@submit');
Route::get('/caffeList', 'caffeSubmitController@getCaffes');

Route::resources([

    'caffe' => 'CaffeController'

]);