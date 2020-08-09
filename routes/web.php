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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('stock/create', 'Admin\StockController@add');
    Route::post('stock/create', 'Admin\StockController@create');
    Route::get('stock', 'Admin\StockController@index');
    Route::get('stock/edit', 'Admin\StockController@edit');
    Route::post('stock/edit', 'Admin\StockController@update');
    Route::get('stock/delete', 'Admin\StockController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'StockController@index');
