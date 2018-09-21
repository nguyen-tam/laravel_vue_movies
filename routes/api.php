<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('films', 'FilmController@index');
Route::get('films/{id}', 'FilmController@show');
Route::post('films', 'FilmController@store');
Route::put('films/{id}', 'FilmController@update');
Route::delete('films/{id}', 'FilmController@delete');