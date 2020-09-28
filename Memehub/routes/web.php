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

Route::get('/videos', 'App\Http\Controllers\VideosController@show')->name('videos');
Route::get('/videos/upload', 'App\Http\Controllers\VideosController@upload')->name('videos.upload');
Route::post('/videos', 'App\Http\Controllers\VideosController@store')->name('store.post');
Route::get('/detail', 'App\Http\Controllers\DetailController@show')->name('detail');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
