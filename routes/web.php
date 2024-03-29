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

Route::get('/', 'HomeController@index');

Route::get('/films', 'FilmController@list');
Route::get('/films/create', 'FilmController@create');
Route::get('/films/{slug}', 'FilmController@showDetail');

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');