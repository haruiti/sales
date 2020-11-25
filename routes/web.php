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

Route::get('/', function () {
    return view('vendas/index');
});

Route::get('addProduct','vendasController@addProduct');
Route::get('getProduct','vendasController@getProduct');
Route::get('addVenda','vendasController@addVenda');
