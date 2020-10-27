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
    return view('image');
});

Route::get('/image','ImageController@index');
Route::post('/addimage','ImageController@store')->name('addimage');
Route::get('/imgpage','ImageController@display');
Route::get('/editimage/{id}','ImageController@edit');
Route::put('/updateimage/{id}','ImageController@update');
Route::get('/deleteimage/{id}','ImageController@delete');
Route::get('/download/{image}','ImageController@download');
Route::get('/zip/{image}','ImageController@zipFile');
