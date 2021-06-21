<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\PostController;
use App\Http\Controllers\Home\LocalizationController;
use Illuminate\Support\Facades\Auth;
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
Route::get('info', function() { phpinfo(); });

Route::get('', [HomeController::class, 'index'])->name('home.index');
Route::get('product/{id}', [ProductController::class, 'show'])->name('home.product');
Route::get('search',  [ProductController::class, 'searchProduct'])->name('home.search');
Route::get('post', [PostController::class, 'searchPost'])->name('home.category-post');
Route::get('post-group-category', [PostController::class, 'groupPostCategory'])->name('home.group-post-category');
Route::get('post/{id}', [PostController::class, 'detailPost'])->name('home.detail-post');

Route::get('{locale}', [LocalizationController::class, 'set'])->name('locale')->where('locale', 'en|vi');
Auth::routes(['register' => false, 'reset' => false, 'verify' => true]);

Route::fallback(function () {
    return redirect('/');
});

