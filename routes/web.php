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

Route::get('/', "usuariosController@inicio");

Route::get('salir', "usuariosController@salir");

Route::get('dashboard', "usuariosController@dashboard");

Route::post('usuarios', "usuariosController@login");
