<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CharacteristicController;
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
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Characteristics
//Route::resource('characteristics', CharacteristicController::class);
Route::get('/characteristics/index', [CharacteristicController::class, 'index'])->name('characteristics.index');
Route::get('characteristics/create', [CharacteristicController::class, 'create']) -> name('characteristics.create');
Route::post('/characteristics/store', [CharacteristicController::class, 'store'])->name('characteristics.store');
Route::get('characteristics/{id}/edit', [CharacteristicController::class, 'edit'])->name('characteristics.edit');
Route::put('characteristics/{id}', [CharacteristicController::class, 'update'])->name('characteristics.update');
Route::delete('characteristics/{id}', [CharacteristicController::class, 'destroy'])->name('characteristics.destroy');

//Products
Route::get('/product/index',[ProductController::class,'index'])->name('product.index');
Route::get('/product/{id}/info', [ProductController::class, 'info'])->name('product.info');
Route::get('product/add', [ProductController::class, 'create'])->name('product.add');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::post('product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

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
//Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
//Route::get('/product/index',[ProductController::class,'index'])->name('product.index');
