<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\PostController;
use App\Http\Controllers\Home\CmsController;
use App\Http\Controllers\Home\PaymentController;
use App\Http\Controllers\Home\LocalizationController;
use App\Http\Controllers\Home\CustomerController;
use App\Http\Controllers\Home\AuthController;
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
Route::get('gio-hang', [HomeController::class, 'cart'])->name('home.cart');
Route::get('thanh-toan', [HomeController::class, 'pay'])->name('home.pay');
Route::post('/payment', [PaymentController::class, 'pay'])->name('pay.create-pay');
Route::post('comments', [ProductController::class, 'postComments'])->name('product.comments');
Route::post('ajax-comments', [ProductController::class, 'ajaxComments'])->name('product.ajax-comments');
//Route::post('dang-nhap', [AuthController::class, 'login'])->name('login');

Route::get('{locale}', [LocalizationController::class, 'set'])->name('locale')->where('locale', 'en|vi');
Route::post('/cms', [CmsController::class, 'index']);
Auth::routes(['register' => false, 'reset' => false, 'verify' => true]);

Route::post('register-member', [CustomerController::class, 'registerMember'])->name('home.register-member');
Route::get('tu-van', [HomeController::class, 'questionIndex'])->name('home.question');
Route::post('new-question', [HomeController::class, 'addQuestion'])->name('home.new-question');
Route::fallback(function () {
    return redirect('/');
});

