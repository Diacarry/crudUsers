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

/*Route::get('/', function () {
    $registros = [];
    return view('index', ['data' => $registros]);
});*/


Route::get('/', 'PagesController@Home');

Route::resource('/users', 'UserController');

Route::resource('/hobbies','HobbyController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');