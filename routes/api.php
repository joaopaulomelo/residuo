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

Route::get('/', function () {
    return response()->json(['message' => 'Jobs API', 'status' => 'Connected']);
});

Route::get('/residuos/{id?}', 'App\Http\Controllers\ResiduosController@index');
Route::post('/residuos', 'App\Http\Controllers\ResiduosController@cadastrar');
Route::put('/residuos/{id}', 'App\Http\Controllers\ResiduosController@editar');
Route::delete('/residuos/{id}', 'App\Http\Controllers\ResiduosController@deletar');

