<?php

use App\Http\Controllers\BannerController;
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

Route::get('/product', function () {
    return view('product.index');
});

Route::get('/brand', function () {
    return view('brand.index');
});

Route::get('/banner', [BannerController::class,  'index']);
Route::get('/banner/create', [BannerController::class,  'create']);