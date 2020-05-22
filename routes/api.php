<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Rotas não autenticadas

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
});
Route::resource('user', 'UserController');
Route::resource('produto', 'ProdutoController');
Route::put('user', 'UserController@update');

// Rotas autenticadas

Route::group(['middleware' => 'apiJwt'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });
});