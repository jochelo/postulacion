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
    return redirect('/login');
});
//Route::post('/registrar', 'Auth\RegisterController@registrar')->name('registrar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/users','UserController')->middleware('admin');
Route::resource('/tests','TestController')->middleware('admin');
Route::resource('/preguntas','PreguntaController')->middleware('admin');
Route::get('preguntas-test', 'TestController@preguntasTestGet')->middleware('admin');
Route::post('preguntas-test','TestController@preguntasTest')->middleware('admin');
Route::get('reporte/solicitud','ReporteController@solicitud');

Route::get('/evaluacion-online','TestController@evaluacionOnline')->name('evaluacion-online');
Route::get('show-test','TestController@getTestInit');
Route::post('show-test','TestController@testInit');
Route::get('resumen','TestUserController@resumen')->middleware('admin');


