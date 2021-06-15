<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\QuestionAnswerController;
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
Route::resource('product', ProductController::class);
Route::resource('product-category', ProductCategoryController::class);
Route::get('product-category/order/{id}',[ProductCategoryController::class, 'order'])->name('product-category.order');
Route::get('/product/commentList/{id}',[ProductController::class, 'commentList'])->name('product.commentList');
Route::resource('page', PageController::class);
Route::resource('slide', SlideController::class);
Route::post('slide/order', [SlideController::class, 'order']);
Route::post('image/destroy', [ImageController::class, 'destroy']);
Route::resource('seo', SeoController::class);
Route::resource('question-answer', QuestionAnswerController::class);


Route::group([
    'namespace'  => 'Admin',
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
//    Route::get('/admin/customer/send', 'CustomerController@send');
//    Route::resource('/admin/customer', 'CustomerController');
//    Route::get("/admin/customer/statistical/{email}", 'CustomerController@statistical');
//
//    Route::resource('/admin/category', 'CategoryController');
//    Route::resource('/admin/post', 'PostController');
//    Route::resource('/admin/configuration', 'ConfigurationController');
//    Route::resource('/admin/product', 'ProductController');

//    Route::resource('/admin/ship', 'ShipController');
//    Route::resource('/admin/slide', 'SlideController');
//    Route::post('/admin/store/updateStatus/{id}',[
//        'as' => 'admin.store.updateStatus',
//        'uses' => 'StoreController@updateStatus'
//    ]);
//
//    Route::resource('/admin/store', 'StoreController');
//    Route::get("/admin/store/statistical/{id}", 'StoreController@statistical');
//    Route::post('/admin/slide/updateAll', 'SlideController@updateAll');
//    Route::post('/admin/image/store', 'ImageController@store');
//    Route::post('/admin/image/destroy', 'ImageController@destroy');
//
//    Route::resource('/admin/cms', 'CmsController')->parameter('cms', 'cms');
//    Route::post('/cms/upload', 'CmsController@upload');
//

//    Route::post('/admin/product-category/doOrder',[
//        'as' => 'admin.product-category.doOrder',
//        'uses' => 'ProductCategoryController@doOrder'
//    ]);
//    Route::resource('/admin/product-category', 'ProductCategoryController');
//
//    Route::get('/admin/product/commentList/{id}',[
//        'as' => 'admin.product.commentList',
//        'uses' => 'ProductController@commentList'
//    ]);
//    Route::post('/admin/comment/updateStatus/{id}',[
//        'as' => 'admin.comment.updateStatus',
//        'uses' => 'CommentController@updateStatus'
//    ]);
//    Route::resource('/admin/comment', 'CommentController');
//    Route::resource('/admin/product', 'ProductController');
//    Route::get('/admin/product/property/{id}',[
//        'as' => 'admin.product.property',
//        'uses' => 'ProductController@property'
//    ]);
//    Route::post('/admin/product/updateProperty/{id}',[
//        'as' => 'admin.product.updateProperty',
//        'uses' => 'ProductController@updateProperty'
//    ]);
//    Route::post('/admin/product/updatePrice/{id}',[
//        'as' => 'admin.product.updatePrice',
//        'uses' => 'ProductController@updatePrice'
//    ]);
//    Route::resource('/admin/service', 'ServiceController');
//    Route::get('/admin/slide/order',[
//        'as' => 'admin.slide.order',
//        'uses' => 'SlideController@order'
//    ]);
//    Route::post('/admin/slide/doOrder',[
//        'as' => 'admin.slide.doOrder',
//        'uses' => 'SlideController@doOrder'
//    ]);
//    Route::resource('/admin/slide', 'SlideController');
//    Route::resource('/admin/introduce', 'IntroduceController');
//
//    Route::resource('/admin/ship', 'ShipController');
//    Route::get('/admin/order/detail/{id}',[
//        'as' => 'admin.order.detail',
//        'uses' => 'OrderController@detail'
//    ]);
//    Route::post('/admin/order/updateStatus/{id}',[
//        'as' => 'admin.order.updateStatus',
//        'uses' => 'OrderController@updateStatus'
//    ]);
//    Route::post('/admin/order/updateDetailStatus/{id}',[
//        'as' => 'admin.order.updateDetailStatus',
//        'uses' => 'OrderController@updateDetailStatus'
//    ]);
//    Route::get('/admin/order/payment/{id}',[
//        'as' => 'admin.order.payment',
//        'uses' => 'OrderController@payment'
//    ]);
//    Route::get('/admin/order/export/{id}',[
//        'as' => 'admin.order.export',
//        'uses' => 'OrderController@export'
//    ]);
//    Route::get('/admin/order/exportAll',[
//        'as' => 'admin.order.exportAll',
//        'uses' => 'OrderController@exportAll'
//    ]);
//    Route::resource('/admin/order', 'OrderController');
});



Route::get('dropzone', function () {
    return view('admin.sample.dropzone');
});
