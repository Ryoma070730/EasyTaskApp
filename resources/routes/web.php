<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 

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

Route::get('/hello','App\Http\Controllers\HomeController@top');

Route::get('/hello/{id}','App\Http\Controllers\HomeController@show')->where('id','[0-9]+');

Route::get('/hello/new','App\Http\Controllers\HomeController@new');

Route::post('/hello/create','App\Http\Controllers\HomeController@create');

Route::get('/hello/edit/{id}','App\Http\Controllers\HomeController@edit')->where('id','[0-9]+');

Route::post('/hello/update/{id}', [HomeController::class, 'update'])->where('id', '[0-9]+'); 

Route::get('/hello/delete/{id}', [HomeController::class, 'destroy'])->where('id', '[0-9]+');
