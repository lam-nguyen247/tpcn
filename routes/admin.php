<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\VisitorController;
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

Route::get('', function () {
    return redirect()->route('customer.index');
});
Route::resource('cms', CmsController::class)->parameter('cms', 'cms');
Route::resource('profile', ProfileController::class)->parameter('profile', 'user');
Route::resource('change-password', PasswordController::class)->parameter('change-password', 'user');
Route::get('configuration/{slug}', [ConfigurationController::class, 'index'])->name('configuration.index');
Route::post('configuration/store', [ConfigurationController::class, 'store'])->name('configuration.store');
Route::resource('visitor', VisitorController::class);
Route::resource('customer', CustomerController::class);
Route::resource('category', CategoryController::class);
Route::get('{masterCategory}/category', [CategoryController::class, 'getCategoryList'])->name('master.category');
Route::post('category/order', [CategoryController::class, 'order']);
Route::resource('post', PostController::class);
Route::resource('page', PageController::class);
Route::resource('slide', SlideController::class);
Route::post('slide/order', [SlideController::class, 'order']);
Route::post('image/destroy', [ImageController::class, 'destroy']);
Route::resource('seo', SeoController::class);

Route::resource('/admin/profile', 'Admin\ProfileController')->parameter('profile', 'user');
Route::get('/admin/customer/send', 'Admin\CustomerController@send');
Route::resource('/admin/customer', 'Admin\CustomerController');
Route::get("/admin/customer/statistical/{email}", 'Admin\CustomerController@statistical');
Route::resource('/admin/category', 'Admin\CategoryController');
Route::resource('/admin/post', 'Admin\PostController');
Route::resource('/admin/configuration', 'Admin\ConfigurationController');
Route::resource('/admin/ship', 'Admin\ShipController');
Route::resource('/admin/slide', 'Admin\SlideController');
Route::post('/admin/store/updateStatus/{id}',[
    'as' => 'admin.store.updateStatus',
    'uses' => 'Admin\StoreController@updateStatus'
]);
Route::resource('/admin/store', 'Admin\StoreController');
Route::get("/admin/store/statistical/{id}", 'Admin\StoreController@statistical');
Route::post('/admin/slide/updateAll', 'Admin\SlideController@updateAll');
Route::post('/admin/image/store', 'Admin\ImageController@store');
Route::post('/admin/image/destroy', 'Admin\ImageController@destroy');

Route::resource('/admin/cms', 'Admin\CmsController')->parameter('cms', 'cms');
Route::post('/cms/upload', 'Admin\CmsController@upload');

Route::get('/admin/product-category/order/{id}',[
    'as' => 'admin.product-category.order',
    'uses' => 'Admin\ProductCategoryController@order'
]);
Route::post('/admin/product-category/doOrder',[
    'as' => 'admin.product-category.doOrder',
    'uses' => 'Admin\ProductCategoryController@doOrder'
]);
Route::resource('/admin/product-category', 'Admin\ProductCategoryController');

Route::get('/admin/product/commentList/{id}',[
    'as' => 'admin.product.commentList',
    'uses' => 'Admin\ProductController@commentList'
]);
Route::post('/admin/comment/updateStatus/{id}',[
    'as' => 'admin.comment.updateStatus',
    'uses' => 'Admin\CommentController@updateStatus'
]);
Route::resource('/admin/comment', 'Admin\CommentController');
Route::resource('/admin/product', 'Admin\ProductController');
Route::get('/admin/product/property/{id}',[
    'as' => 'admin.product.property',
    'uses' => 'Admin\ProductController@property'
]);
Route::post('/admin/product/updateProperty/{id}',[
    'as' => 'admin.product.updateProperty',
    'uses' => 'Admin\ProductController@updateProperty'
]);
Route::post('/admin/product/updatePrice/{id}',[
    'as' => 'admin.product.updatePrice',
    'uses' => 'Admin\ProductController@updatePrice'
]);
Route::resource('/admin/service', 'Admin\ServiceController');
Route::get('/admin/slide/order',[
    'as' => 'admin.slide.order',
    'uses' => 'Admin\SlideController@order'
]);
Route::post('/admin/slide/doOrder',[
    'as' => 'admin.slide.doOrder',
    'uses' => 'Admin\SlideController@doOrder'
]);
Route::resource('/admin/slide', 'Admin\SlideController');
Route::resource('/admin/introduce', 'Admin\IntroduceController');

Route::resource('/admin/ship', 'Admin\ShipController');
Route::get('/admin/order/detail/{id}',[
    'as' => 'admin.order.detail',
    'uses' => 'Admin\OrderController@detail'
]);
Route::post('/admin/order/updateStatus/{id}',[
    'as' => 'admin.order.updateStatus',
    'uses' => 'Admin\OrderController@updateStatus'
]);
Route::post('/admin/order/updateDetailStatus/{id}',[
    'as' => 'admin.order.updateDetailStatus',
    'uses' => 'Admin\OrderController@updateDetailStatus'
]);
Route::get('/admin/order/payment/{id}',[
    'as' => 'admin.order.payment',
    'uses' => 'Admin\OrderController@payment'
]);
Route::get('/admin/order/export/{id}',[
    'as' => 'admin.order.export',
    'uses' => 'Admin\OrderController@export'
]);
Route::get('/admin/order/exportAll',[
    'as' => 'admin.order.exportAll',
    'uses' => 'Admin\OrderController@exportAll'
]);
Route::resource('/admin/order', 'Admin\OrderController');

Route::get('dropzone', function () {
    return view('admin.sample.dropzone');
});
