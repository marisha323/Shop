<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

// Category
Route::get('category/add_category', [CategoryController::class, 'add']) -> name('category.add_category');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/add-product', [ProductController::class, 'create_product'])->name('admin.create_product');
//    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
//    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
//    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
});
require __DIR__.'/auth.php';
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/index',[ProductController::class,'index'])->name('product.index');
