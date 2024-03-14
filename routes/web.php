<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\ProductDetailsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CategoryController::class, 'index']);
Route::get('/clear', function () {

    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
});

// Brand Route
Route::group(['prefix' => 'brand'], function () {

    Route::get('/index', [BrandController::class, 'index']);
    Route::get('/create', [BrandController::class, 'create']);
    Route::post('/store', [BrandController::class, 'store']);
    Route::get('/edit/{brand}', [BrandController::class, 'edit']);
    Route::post('/update/{brand}', [BrandController::class, 'update']);
    Route::post('/destroy/{brand}', [BrandController::class, 'destroy']);
    
});

// Category Route
Route::group(['prefix' => 'category'], function () {

    Route::get('/index', [CategoryController::class, 'index']);
    Route::get('/create', [BrandController::class, 'create']);
    Route::post('/store', [CategoryController::class, 'store']);
    Route::get('/edit/{category}', [CategoryController::class, 'edit']);
    Route::post('/update/{category}', [CategoryController::class, 'update']);
    Route::post('/destroy/{category}', [CategoryController::class, 'destroy']);
    
});

//sub category route

Route::group(['prefix' =>'subCategory'], function () {

    Route::get('/index', [SubCategoryController::class, 'index']);
    Route::get('/create', [CategoryController::class, 'create']);
    Route::post('/store', [SubCategoryController::class, 'store']);
    Route::get('/edit/{subCategory}', [SubCategoryController::class, 'edit']);
    Route::post('/update/{subCategory}', [SubCategoryController::class, 'update']);
    Route::post('/destroy/{subCategory}', [SubCategoryController::class, 'destroy']);
    
});

//child category

Route::group(['prefix' =>'childCategory'], function () {

    Route::get('/index', [ChildCategoryController::class, 'index']);
    Route::get('/create', [ChildCategoryController::class, 'create']);
    Route::post('/store', [ChildCategoryController::class, 'store']);
    Route::get('/edit/{childCategory}', [ChildCategoryController::class, 'edit']);
    Route::post('/update/{childCategory}', [ChildCategoryController::class, 'update']);
    Route::post('/destroy/{childCategory}', [ChildCategoryController::class, 'destroy']);
    
});

//product route

Route::group(['prefix' =>'product'], function () {

    Route::get('/index', [ProductController::class, 'index']);
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/store', [ProductController::class, 'store']);
    Route::get('/edit/{product}', [ProductController::class, 'edit']);
    Route::post('/update/{product}', [ProductController::class, 'update']);
    Route::post('/destroy/{product}', [ProductController::class, 'destroy']);
    
});

//product details route 

Route::group(['prefix' =>'productDetails'], function () {

    Route::get('/index', [ProductDetailsController::class, 'index']);
    Route::get('/create', [ProductDetailsController::class, 'create']);
    Route::post('/store', [ProductDetailsController::class, 'store']);
    Route::get('/edit/{product}', [ProductDetailsController::class, 'edit']);
    Route::post('/update/{product}', [ProductDetailsController::class, 'update']);
    Route::post('/destroy/{product}', [ProductDetailsController::class, 'destroy']);
    
});
