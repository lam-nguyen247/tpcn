<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BrandController;
use App\Http\Controllers\Home\ChannelController;
use App\Http\Controllers\Home\CmsController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\CustomerController;
use App\Http\Controllers\Home\DigitalController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\LocalizationController;
use App\Http\Controllers\Home\PageController;
use App\Http\Controllers\Home\PostController;
use App\Http\Controllers\Home\WebsiteController;
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

Route::get('', [HomeController::class, 'index']);
Route::get('{aboutUs}', [AboutController::class, 'index'])->where('aboutUs', 'about-us|gioi-thieu-chung');
Route::get('{websiteDesign}', [WebsiteController::class, 'index'])->where('websiteDesign', 'website-design|thiet-ke-website');
Route::get('{brandDesignPosm}', [BrandController::class, 'index'])->where('brandDesignPosm', 'branding-design-posm|thiet-ke-logo-posm');
Route::get('{digitalMarketing}', [DigitalController::class, 'index'])->where('digitalMarketing', 'digital-marketing|dich-vu-digital-marketing');
Route::get('{contact}', [ContactController::class, 'index'])->where('contact', 'contact|lien-he');
Route::get('{news}', [PostController::class, 'index'])->where('news', 'news|tin-tuc');
Route::get('{news}/{post:slug}', [PostController::class, 'detail'])->where('news', 'news|tin-tuc');
Route::get('mua-kenh-youtube', [ChannelController::class, 'index']);
Route::post('customer', [CustomerController::class, 'store']);
Route::post('cms', [CmsController::class, 'index']);
Route::get('chuyen-nhuong-lai-kenh-youtube', [PageController::class,'transChannel']);
Route::get('quy-trinh-giao-dich-kenh-youtube', [PageController::class,'methodChannel']);


Route::get('{locale}', [LocalizationController::class, 'set'])->name('locale')->where('locale', 'en|vi');
//Route::get('{provider}/login', [LoginController::class, 'redirectToProvider'])->name('social');
//Route::get('{provider}/callback', [LoginController::class, 'handleProviderCallback']);
Auth::routes(['register' => false, 'reset' => false, 'verify' => true]);

Route::fallback(function () {
    return redirect('/');
});

//Route::get('key', [ChanelController::class, 'getKey']);
