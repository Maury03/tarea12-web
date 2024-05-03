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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/personajes', 'PersonajeController@index');
Route::get('/personaje/{id}', 'PersonajeController@show');
Route::post('/personaje', 'PersonajeController@store');
Route::put('/personaje', 'PersonajeController@update');
Route::delete('/personaje/{id}', 'PersonajeController@destroy');

Route::get('/peliculas', 'PeliculaController@index');
Route::get('/pelicula/{id}', 'PeliculaController@show');
Route::post('/pelicula', 'PeliculaController@store');
Route::put('/pelicula', 'PeliculaController@update');
Route::delete('/pelicula/{id}', 'PeliculaController@destroy');
