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

Auth::routes(["register" => false]); //he puesto esto ya que quería anular el registro de usurios(Que desapareciese el botón REGISTER)

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Cycles', 'CyclesController');

Route::get('Cycles', 'cycles.index.php');
Route::get('Cycles', 'cycles.create.php');
Route::get('Cycles', 'cycles.edit.php');
Route::get('Cycles', 'cycles.shoe.php');