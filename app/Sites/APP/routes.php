<?php
Route::get('/', 'IndexController@index');
Route::get('/caffe/show/{caffe_id}', 'IndexController@caffe')->name('show');
Route::get('users', 'IndexController@users');

Route::get('/caffe/show/{caffe_id}','IndexController@caffe')->name('show');


Route::post('caffe/show/{caffe_id}/contact','IndexController@contact')->name('contact');

Route::post('/reservation/send', 'ReservationController@reserve')->name('reserve');

Auth::routes();
Route::get('/logout','LogoutController@logout');


Route::post('/menu/order', 'MenuController@order');