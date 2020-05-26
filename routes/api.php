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
Route::resource('user', 'UserController'); //CRUD USERS
Route::resource('foto', 'FotosProdutoController'); // Insert e Get All Fotos
Route::resource('categorias', 'CategoriasProdutoController'); // Get All Categorias

Route::get('produtos/{idFornecedor?}', 'ProdutoController@getAllProdutosFornecedor'); // Get All Produtos de um Fornecedor
Route::get('gradesProduto/{id}', 'ProdutoController@grades'); //Get All Grades de um Produto
Route::get('fotosProduto/{id}', 'ProdutoController@fotos'); // Get All Fotos de um Produto

Route::put('user', 'UserController@update'); //Editar usuario

// Rotas autenticadas

Route::group(['middleware' => 'apiJwt'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });
    Route::resource('produto', 'ProdutoController'); //CRUD Produtos
});