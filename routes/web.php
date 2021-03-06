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

Route::get('/home', 'HomeController@index');
Route::group(['middleware'=> ['web']],function (){
    Route::resource('/estado','EstadoController');
    Route::resource('/cliente','ClienteController');
    Route::resource('/tipo','TipoController');
    Route::resource('/comprapedido','ComprapedidoController');
    Route::resource('/compra','CompraController');
});