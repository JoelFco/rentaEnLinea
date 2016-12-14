<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//generales




Route::get('/','productosController@mCategorias');
Route::get('/home','productosController@mCategorias');

Route::get('/mProductosPorCategoria/{id}','productosController@mProductosPorCategoria');
Route::get('/mProductoIndividual/{id}','productosController@mProductoIndividual');



Route::get('/membresia','userController@membresia');
Route::post('/guardarMembresia','userController@guardarMembresia');
Route::get('/mostrarRentas','userController@mostrarRentas');

//carro
Route::get('/carro','cartController@carro')->middleware('auth');
Route::get('/addCar/{id}','cartController@addCar');
Route::get('/eliminarCar/{id}','cartController@eliminarCar');
Route::get('/caja','cartController@caja')->middleware('auth');
Route::post('/actualizarCarro','cartController@actualizarCarro');
Route::post('/pedido','cartController@hacerPedido');

//pedidos
Route::get('/pedidos','userController@pedidosUsuario')->middleware('auth');

Auth::routes();

