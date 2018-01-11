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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/setPermission', function(){
  auth()->user()->givePermissionTo('edit articles');
  return "ok";
});

Route::get('/setRole', function(){
  auth()->user()->assignRole('writer');
  return "ok";
});

Route::get('/privado', function(){
  return "Esta ruta es privada";
})->middleware(['role:writer']);
