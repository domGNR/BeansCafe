<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.home');


// clients
Route::get('/dashboard/users', [DashboardController::class,'showUsers'])->name('dashboard.users.show');
Route::get('/dashboard/users/{user}', [DashboardController::class,'editUser'])->name('dashboard.users.edit');
Route::post('/dashboard/users/{user}/update', [DashboardController::class,'updateUser'])->name('dashboard.users.update');

// Clients
// Route::get('/dashboard/clients', [DashboardController::class,'showclients'])->name('dashboard.clients.show');
// Route::get('/dashboard/clients/{client}', [DashboardController::class,'editClient'])->name('dashboard.clients.edit');
// Route::post('/dashboard/clients/{client}/update', [DashboardController::class,'updateClient'])->name('dashboard.clients.update');
// Route::post('/dashboard/clients/{client}/delete', [DashboardController::class,'deleteClient'])->name('dashboard.clients.delete');

// Brands
Route::get('/dashboard/brands', [DashboardController::class,'showBrands'])->name('dashboard.brands.show');
Route::get('/dashboard/brands/create', [DashboardController::class,'createBrand'])->name('dashboard.brands.create');
Route::get('/dashboard/brands/{brand}', [DashboardController::class,'editBrand'])->name('dashboard.brands.edit');
Route::post('/dashboard/brands/store', [DashboardController::class,'storeBrand'])->name('dashboard.brands.store');
Route::post('/dashboard/brands/{brand}/update', [DashboardController::class,'updateBrand'])->name('dashboard.brands.update');
Route::delete('/dashboard/brands/{brand}/delete', [DashboardController::class,'destroyBrand'])->name('dashboard.brands.destroy');


// Categories
// Products
// Photos
// Orders
// Addresses
