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
Route::get('/about','ProductController@index');
Route::post('/saveproduct','ProductController@store');
Route::get('/editproduct/{id}','ProductController@edit');
Route::post('/updateProduct','ProductController@update');

Route::get('/deleteproduct/{id}','ProductController@destroy');
