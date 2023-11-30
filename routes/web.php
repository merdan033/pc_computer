<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Route;

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

Route::get('', [HomeController::class, 'index'])->name('home');


Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class)
    ->except(['index', 'show']);
Route::resource('brands', BrandController::class)
    ->except(['index', 'show']);
Route::resource('series', SerieController::class)
    ->except(['index', 'show']);