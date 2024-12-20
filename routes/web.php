<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CharacteristicController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TelegramBotController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


//USERS
Route::get('user/users', [UserController::class, 'index'])->name('user.index');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');

Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/orders', [OrderController::class, 'showOrderForm'])->name('order.order');

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/information', [HomeController::class, 'information'])->name('information');
Route::get('/search', [HomeController::class, 'search'])->name('search');

//REFERAl LINK
Route::get('/user/{user}/referral-link', [HomeController::class, 'generateReferralLink'])
    ->name('user.referral-link');

// CART
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::patch('/cart/update/{id}',[CartController::class,'updateQuantity'])->name('cart.update');


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

//Colors
Route::get('/color/index', [ColorController::class, 'index'])->name('color.index');
Route::get('color/create', [ColorController::class, 'create']) -> name('color.create');
Route::post('/color/store', [ColorController::class, 'store'])->name('color.store');
Route::get('color/{id}/edit', [ColorController::class, 'edit'])->name('color.edit');
Route::put('color/{id}', [ColorController::class, 'update'])->name('color.update');
Route::delete('color/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
// Для видалення кольору
Route::delete('product/{productId}/color/{colorId}', [ColorController::class, 'delete_color'])->name('color.delete_color');
// Для видалення фото
Route::delete('product/{productId}/image/{photoId}', [ProductController::class, 'delete_image_products'])->name('product.delete_image_products');



//Brands
Route::get('/brand/index', [BrandController::class, 'index'])->name('brand.index');
Route::get('brand/create', [BrandController::class, 'create']) -> name('brand.create');
Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
Route::put('brand/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::delete('brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');


//Products
Route::get('/products', [ProductController::class, 'products'])->name('products.home');
Route::get('product/info/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/{itemName}/updateColor', [ProductController::class, 'updateColor'])->name('product.updateColor');



Route::get('/product/index',[ProductController::class,'index'])->name('product.indexf');
Route::get('/product/{id}/info', [ProductController::class, 'info'])->name('product.info');
Route::get('product/add', [ProductController::class, 'create'])->name('product.add');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/products/category/{id}', [HomeController::class, 'showCategory'])->name('products.showCategory');

//ORDERS
Route::get('/orders/order',[OrderController::class,'showOrders'])->name('orders.order');
Route::put('/history-orders/{historyOrder}/status', [OrderController::class, 'updateStatus']);


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/add-product', [ProductController::class, 'create_product'])->name('admin.create_product');
    });
});
require __DIR__.'/auth.php';
//Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
//Route::get('/product/index',[ProductController::class,'index'])->name('product.index');


Route::group(['middleware' => ['auth', 'role:manager']], function () {
    // маршрути доступні тільки для менеджерів
});
