<?php
Route::get('/', 'IndexController@index');
//caffe
Route::get('/caffe', 'CaffeController@getCaffes');
Route::get('/caffe/add','CaffeController@index');
Route::post('/caffe/submit','CaffeController@submit');
Route::get('/caffe/edit/{caffe_id}','CaffeController@edit');
Route::get('/caffe/show/{caffe_id}',[
    'as' => 'caffe.show',
    'uses' => 'CaffeController@show'
]);
Route::get('/caffe/employees/{caffe_id}','CaffeController@showEmployees');
Route::resource('caffe', 'CaffeController')->only([
    'update','destroy'
]);
////employee
//Route::get('/employees', 'EmployeesController@getEmployees');
//Route::get('/employees/add' , 'EmployeesController@index');
//Route::post('/employees/submit', 'EmployeesController@submit');
//Route::get('/employees/edit/{employee_id}','EmployeesController@edit');
/*Route::resource('employees', 'EmployeesController')->only([
    'update','destroy'
]);*/
//article
Route::get('/article','ArticleController@index');
Route::get('/article/edit/{article_id}','ArticleController@edit');
Route::post('/article/submit','ArticleController@submit');
Route::resource('article', 'ArticleController')->only([
    'update','destroy'
]);
//table
Route::get('/table','TableController@getTables');
Route::put('/table/{table_id}','TableController@reserve')->name('reserve');
Route::put('/table/release/{table_id}','TableController@release')->name('release');
Route::get('/table/add','TableController@index');
Route::post('/table/submit','TableController@submit');
Route::get('/table/edit/{table_id}','TableController@edit');
Route::resource('table', 'TableController')->only([
    'update','destroy'
]);
//article
Route::get('/article', 'ArticleController@getArticles');
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
    'destroy', 'show'
]);

Route::put('/menu/update/{menu_id}','MenuController@updateMenu');
//post
Route::get('/post','PostController@getPosts');;
Route::get('/post/add','PostController@index');
Route::post('/post/submit','PostController@submit');
Route::get('/post/edit/{id}','PostController@edit');
//Route::get('/post/show/{id}',[
//    'as' => 'post.show',
//    'uses' => 'PostController@show'
//]);
Route::resource('post', 'PostController')->only([
    'update','destroy'
]);

//reservation
Route::get('reservation', 'ReservationController@index')->name('reservation.index');
Route::get('/caffe/reservations/{caffe_id}', 'ReservationController@show');
Route::post('/reservation/{reservation_id}', 'ReservationController@confirm')->name('reservation.status');
Route::delete('/reservation/{reservation_id}', 'ReservationController@destroy')->name('reservation.destroy');


Auth::routes();
Route::get('logout','LogoutController@logout');

Route::resources([
    'users'=>'UsersController'
]);

Route::get('users/delete/{userId}','UsersController@destroy');
Route::put('users/editpassword/{user}','UsersController@editPassword');

Route::post('notification/caffe/notification', 'CaffeController@notification');

Route::get('hello',function (){

    return View::make('hello');

});

Route::get('403',function (){

    return View::make('errors.403');

});

Route::resource('orders', 'OrderController')->except('update');
Route::put('orders/store/{order}','OrderController@update');


Route::get('/orders/{order}/caffe/{caffe}','OrderController@show');

Route::post('order/apply','OrderController@applyOrder');
Route::post('order/delete','OrderController@deleteOrder');