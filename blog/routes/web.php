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

// Route::get('/view', function () {
//     return view('store.view');
// });

// Route::get('/', [StoreController::class,'index']);
Route::get('/', 'App\Http\Controllers\StoreController@index');
Route::get('/store/view/{post}', 'App\Http\Controllers\StoreController@getView');
Route::get('/store/category/{category}', 'App\Http\Controllers\StoreController@getCategory');
Route::get('/store/search', 'App\Http\Controllers\StoreController@getSearch');
Route::controller('store','StoreController');
Route::resource('category',CategoryController::class);
Route::resource('post',PostController::class);
