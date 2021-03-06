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

Route::post('/videos/upload', 'App\Http\Controllers\VideosController@store')->name('store.post');
Route::post('/videos/error', 'App\Http\Controllers\VideosController@upload')->name('error');
Route::get('/videos/watch', 'App\Http\Controllers\WatchController@show')->name('watch');

Route::post('/videos/watch', 'App\Http\Controllers\WatchController@like')->name('like');

Route::get('/myuploads', 'App\Http\Controllers\VideosController@myuploads')->name('myuploads');

Route::post('/videos', 'App\Http\Controllers\VideosController@search')->name('videos.search');

Route::post('/admin/videostatus', 'App\Http\Controllers\AdminController@videostatus')->name('admin.videostatus');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\VideosController@show')->name('home');
Route::get('/admin', 'App\Http\Controllers\AdminController@admin')->middleware('is_admin')->name('admin');
