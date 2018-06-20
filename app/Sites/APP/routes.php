<?php
Route::get('/', 'IndexController@index');
Route::get('/caffe/show/{caffe_id}', 'IndexController@caffe')->name('show');
Route::get('users', 'IndexController@users');

Route::get('/caffe/show/{caffe_id}','IndexController@caffe')->name('show');

Route::post('/reservation/send', 'ReservationController@reserve')->name('reserve');

