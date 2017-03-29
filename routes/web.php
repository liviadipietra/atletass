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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/meusEventos', 'HomeController@meusEventos')->name('meusEventos');

Route::get('/registrar', 'HomeController@registrar')->name('registrar');

Route::post('/saveRegistro', 'HomeController@saveRegistro')->name('saveRegistro');

Route::get('/registros', 'HomeController@registros')->name('registros');

Route::get('/atletas', 'HomeController@atletas')->name('atletas');

Route::get('/totalregistros', 'HomeController@totalregistros')->name('totalregistros');

Auth::routes();

Route::get('/logout', function(){
  Auth::logout();
  return redirect('/');
})->name('logout');
