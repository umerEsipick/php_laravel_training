<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/', 'App\Http\Controllers\StoreController@index');
Route::get('/store/view/{post}', 'App\Http\Controllers\StoreController@getView');
Route::get('/store/category/{category}', 'App\Http\Controllers\StoreController@getCategory');
Route::get('/store/search', 'App\Http\Controllers\StoreController@getSearch');
Route::controller('store','StoreController');
Route::resource('category',CategoryController::class);
Route::resource('post',PostController::class);
Route::resource('user',UserController::class);
Route::get('/mail/confirm/{email}', 'App\Http\Controllers\MailController@getConfirm');
Route::controller('mail','MailController');

require __DIR__.'/auth.php';