<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('store.home');

Route::get('/shop', [HomeController::class,'indexShop'])->name('store.shop');

Route::get('/shop/cart', [HomeController::class,'cart'])->name('store.cart');
Route::get('/shop/{product}',[HomeController::class,'singleProduct'])->name('store.shop.single');
Route::get('/shop/cart/checkout',[HomeController::class,'checkout'])->name('store.cart.checkout');

Route::get('/orders',[OrderController::class,'index'])->name('order.index');
Route::get('/orders/{order}',[OrderController::class,'edit'])->name('order.edit');
Route::post('/orders/store',[OrderController::class,'store'])->name('order.store');
Route::post('/orders/{order}/return', [OrderController::class,'returnOrder'])->name('order.return');

// Users
Route::get('/dashboard/users', [DashboardController::class,'indexUsers'])->name('dashboard.users.index');
Route::get('/dashboard/users/{user}', [DashboardController::class,'editUser'])->name('dashboard.users.edit');
Route::post('/dashboard/users/{user}/update', [DashboardController::class,'updateUser'])->name('dashboard.users.update');

// Brands
Route::get('/dashboard/brands', [DashboardController::class,'indexBrands'])->name('dashboard.brands.index');
Route::get('/dashboard/brands/{brand}', [DashboardController::class,'editBrand'])->name('dashboard.brands.edit');
Route::post('/dashboard/brands/store', [DashboardController::class,'storeBrand'])->name('dashboard.brands.store');
Route::post('/dashboard/brands/{brand}/update', [DashboardController::class,'updateBrand'])->name('dashboard.brands.update');
Route::delete('/dashboard/brands/{brand}/delete', [DashboardController::class,'destroyBrand'])->name('dashboard.brands.destroy');

// Categories
Route::get('/dashboard/categories', [DashboardController::class,'indexCategories'])->name('dashboard.categories.index');
Route::get('/dashboard/categories/{category}', [DashboardController::class,'editCategory'])->name('dashboard.categories.edit');
Route::post('/dashboard/categories/store', [DashboardController::class,'storeCategory'])->name('dashboard.categories.store');
Route::post('/dashboard/categories/{category}/update', [DashboardController::class,'updateCategory'])->name('dashboard.categories.update');
Route::delete('/dashboard/categories/{category}/delete', [DashboardController::class,'destroyCategory'])->name('dashboard.categories.destroy');


// Products
Route::get('/dashboard/products', [DashboardController::class,'indexProducts'])->name('dashboard.products.index');
Route::get('/dashboard/products/{product}', [DashboardController::class,'editProduct'])->name('dashboard.products.edit');
Route::post('/dashboard/products/store', [DashboardController::class,'storeProduct'])->name('dashboard.products.store');
Route::post('/dashboard/products/{product}/update', [DashboardController::class,'updateProduct'])->name('dashboard.products.update');
Route::delete('/dashboard/products/{product}/delete', [DashboardController::class,'destroyProduct'])->name('dashboard.products.destroy');


// Photos
Route::delete('/dashboard/photos/{photo}/delete', [DashboardController::class,'destroyPhoto'])->name('dashboard.photos.destroy');
Route::post('/dashboard/photos/{product}/cover/delete', [DashboardController::class,'destroyCover'])->name('dashboard.cover.destroy');

// Orders
Route::get('/dashboard/orders', [DashboardController::class,'indexOrders'])->name('dashboard.orders.index');
Route::get('/dashboard/orders/{order}', [DashboardController::class,'editOrder'])->name('dashboard.orders.edit');
Route::post('/dashboard/orders/{order}/update', [DashboardController::class,'updateOrder'])->name('dashboard.orders.update');
Route::post('/dashboard/orders/{order}/return', [DashboardController::class,'completeReturnOrder'])->name('dashboard.orders.return');
Route::post('/dashboard/categories/{order}/cancel', [DashboardController::class,'cancelOrder'])->name('dashboard.orders.cancel');
