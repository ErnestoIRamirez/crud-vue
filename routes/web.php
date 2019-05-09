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
Route::get('home-formulario', 'HomeController@show')->name('home.formulario');
Route::get('thoughts', 'ThoughtController@index')->name('thoughts');
Route::post('thoughts-store', 'ThoughtController@store')->name('thoughts.store');
Route::post('thoughts-update', 'ThoughtController@update')->name('thoughts.update');
Route::post('thoughts-delete', 'ThoughtController@destroy')->name('thoughts.delete');

Route::resource('users', 'UserController');
Route::get('datatable', 'UserController@show')->name('datatable');

Route::resource('personas', 'PersonaController');
