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

Route::get('/data', 'ApiController@index');
Route::post('/data', 'ApiController@create');
Route::delete('/data/{id}', 'ApiController@delete');
Route::get('/data/{id}', 'ApiController@get_update');
Route::post('/data/{id}', 'ApiController@update');