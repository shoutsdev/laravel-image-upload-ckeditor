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

Route::resource('images', \App\Http\Controllers\ImageController::class)->only(['create', 'store']);
Route::post('image-upload', [\App\Http\Controllers\ImageController::class,'imageUpload'])->name('image.upload');
