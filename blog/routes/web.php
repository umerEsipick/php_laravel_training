<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Route::get('/view', function () {
    return view('store.view');
});

// Route::get('/','StoreController@index');
Route::get('/', [StoreController::class,'index']);
Route::controller('store', 'App\Http\Controllers\StoreController');
Route::resource('category',CategoryController::class);
Route::resource('post',PostController::class);
