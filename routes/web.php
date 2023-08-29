<?php
use Illuminate\Support\Facades\Route;
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

Route::get('/','ClientesController@dashboard');

Route::get('/clientes/create', function () {
    return view('clientesCreate');
});

Route::get('/produtos/create', function () {
    return view('produtosCreate');
});

Route::get('/clientes','ClientesController@index');
Route::post('/clientes','ClientesController@create');
Route::get('/clientes/{id}','ClientesController@show');
Route::get('/clientes/edit/{id}','ClientesController@edit');
Route::post('/clientes/update','ClientesController@update');
Route::delete('/clientes/delete','ClientesController@delete');

Route::get('/tabeladeprecos','ClientesController@tabelaPreco');
Route::post('/tabeladeprecos','ClientesController@criaTabelaPreco');

Route::get('/produtos','ProdutosController@index');
Route::post('/produtos','ProdutosController@create');
Route::get('/produtos/{id}','ProdutosController@show');
Route::get('/produtos/edit/{id}','ProdutosController@edit');
Route::post('/produtos/update','ProdutosController@update');
Route::delete('/produtos/delete','ProdutosController@delete');


