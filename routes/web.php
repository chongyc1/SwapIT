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


Route::get('/post-item','ItemController@show');
Route::post('/post-item','ItemController@post');


Route::post('/logout', 'Auth\LoginController@logout');
Route::get('/logout',function (){
    return redirect()->back();
});