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
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'UserdatosController@create')->middleware('auth');
Route::post('/about', 'UserdatosController@store')->middleware('auth');
Route::get('/procesos', 'ProcesosController@index')->middleware('auth');
Route::get('/procesos/{id?}', 'ProcesosController@show')->middleware('auth');
Route::post('/procesos/{id?}', 'ProcesosController@anadirproceso')->middleware('auth');
Route::get('/juzgadounolaboral/{id?}','ProcesosController@juzgadounolaboral')->middleware('auth');
Route::get('/juzgadofecha','ProcesosController@juzgadofecha')->middleware('auth');
Route::post('/juzgadofecha','ProcesosController@buscarjuzgadofecha')->middleware('auth');
Route::get('/misprocesos/{id?}','ProcesosController@userprocesos')->middleware('auth');

Route::post('/notification/get', 'NotificationController@get')->middleware('auth');

Route::post('/notification/markasread', 'NotificationController@markAsRead')->name('markAsRead');
Route::get('/notification/procesoread/{proceso_id?}', 'NotificationController@readProceso')->name('readProceso');
