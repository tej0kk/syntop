<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/banner', [BannerController::class,  'index']);
Route::get('/banner/create', [BannerController::class,  'create']);
Route::post('/banner', [BannerController::class, 'store']);
Route::get('/banner/{banner}/edit', [BannerController::class, 'edit']);
Route::patch('/banner/{banner}', [BannerController::class, 'update']);
Route::delete('/banner/{banner}', [BannerController::class, 'destroy']);

Route::get('/brand', [BrandController::class ,  'index']);
Route::get('/brand/create', [BrandController::class,  'create']);
Route::post('/brand', [BrandController::class, 'store']);
Route::get('/brand/{brand}/edit', [BrandController::class, 'edit']);
Route::patch('/brand/{brand}', [BrandController::class, 'update']);
Route::delete('/brand/{brand}', [BrandController::class, 'destroy']);

Route::get('/product', [ProductController::class ,  'index']);
Route::get('/product/create', [ProductController::class,  'create']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/{product}/edit', [ProductController::class, 'edit']);
Route::patch('/product/{product}', [ProductController::class, 'update']);
Route::delete('/product/{product}', [ProductController::class, 'destroy']);
