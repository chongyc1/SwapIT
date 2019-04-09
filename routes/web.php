<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register', 'Auth\RegisterController@register');

Route::post('/search', 'ItemController@searchItem');


Route::get('/post-item','ItemController@show');
Route::post('/post-item','ItemController@post');
Route::post('/save-item','ItemController@save');
Route::post('/itemCount','ItemController@clicked');

Route::get('/my-item','ItemController@myitem');
Route::get('/item/{id}','ItemController@showItem');

Route::get('/tradeitem/{id}','ItemController@tradeItem');



//Category Route
Route::get('/category/{id}', 'CategoryController@index');
Route::post('/categoryCount','CategoryController@clicked');


Route::get('/setAppointment/{params}', 'AppointmentController@index');
Route::get('/myAppointment', 'AppointmentController@show');


Route::post('/getAppDetail','AppointmentController@showDetails');
Route::post('/updStatus','AppointmentController@updStatus');

Route::post('/saveAppointment','AppointmentController@setAppointment');


Route::post('/logout', 'Auth\LoginController@logout');
Route::get('/logout',function (){
    return redirect()->back();
});