<?php


/**WELCOME */
Route::get('/', function () {
    return view('welcome');
});


Route::resource('users','UserController');

Route::resource('articulos','ArticuloController');

Route::resource('compras','OrdenController');

Route::resource('resenias','ReseniaController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
