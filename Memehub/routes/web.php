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

Route::get('/', 'App\Http\Controllers\VideosController@show')->name('home');

Route::get('/videos', 'App\Http\Controllers\VideosController@show')->name('videos');
Route::get('/videos/upload', 'App\Http\Controllers\VideosController@upload')->name('videos.upload');
Route::post('/videos', 'App\Http\Controllers\VideosController@store')->name('store.post');
Route::get('/videos/watch', 'App\Http\Controllers\WatchController@show')->name('watch');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\VideosController@show')->name('home');
Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');
