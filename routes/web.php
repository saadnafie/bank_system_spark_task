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
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('index', 'App\Http\Controllers\HomeController@index')->name('index');

Route::get('/customerData/{id}', 'App\Http\Controllers\HomeController@customerDetail');

Route::post('transactionProcess', 'App\Http\Controllers\HomeController@transactionProcess')->name('transactionProcess');

/*Route::get('/', function () {
    return view('index');
});*/