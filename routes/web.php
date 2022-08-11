<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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
    return view('index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	Route::resource('categories', AdminCategoryController::class);
	Route::resource('news', AdminNewsController::class);
});

//category routes
Route::get('/category', [CategoryController::class, 'index'])
	->name('category.index');
Route::get('/category/{id}', [CategoryController::class, 'show'])
	->where('id', '\d+')
	->name('category.show');
//news routes
Route::get('/news', [NewsController::class, 'index'])
	->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
	->where('id', '\d+')
	->name('news.show');