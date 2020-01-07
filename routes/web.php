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
    return view('auth.login');
});
Route::post('/registrar', 'Auth\RegisterController@registrar')->name('registrar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/tests','TestController');
Route::resource('/preguntas','PreguntaController');
Route::get('preguntas-test', 'TestController@preguntasTestGet');
Route::post('preguntas-test','TestController@preguntasTest');

