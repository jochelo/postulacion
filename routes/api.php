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

Route::post('preguntas', 'PreguntaController@store');
Route::get('/lista-postulantes','UserController@listaPostulantes');
Route::post('habilitar', 'RespuestaController@habilitar');
Route::post('limpiar-errores', 'RespuestaController@limpiarErrores');
