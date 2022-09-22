<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\SocialController;
use UniSharp\LaravelFilemanager\Lfm;

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

Route::middleware('auth')->group(function() {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function() {
		Route::get('/', AdminController::class)
			->name('index');
			
		Route::get('/parser', ParserController::class)->name('parser.index');

		Route::resource('category', AdminCategoryController::class);
		Route::resource('news', AdminNewsController::class);
		Route::resource('source', AdminSourceController::class);
		Route::resource('user', AdminUserController::class);
	});
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'is_admin']], function () {
    Lfm::routes();
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
Route::resource('source', SourceController::class);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/redirect/{driver}', [SocialController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.auth.redirect');

    Route::get('/auth/callback/{driver}', [SocialController::class, 'callback'])
        ->where('driver', '\w+');
});
