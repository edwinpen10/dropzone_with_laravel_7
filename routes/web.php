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
    return view('welcome');
});

Route::get('/dropzone','ImageController@index');


Route::post('dropzone/upload', 'ImageController@upload')->name('dropzone.upload');

Route::get('dropzone/fetch', 'ImageController@fetch')->name('dropzone.fetch');

Route::get('dropzone/delete', 'ImageController@delete')->name('dropzone.delete');


