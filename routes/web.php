<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerchantController;


//Root
Route::get('/', [AdminController::class, 'index'])->name('root');

//Shop
Route::get('/{shop}', [AdminController::class, 'shop'])->name('shop.show');
// Route::domain('{shop}.localhost')->group(function () {
//     Route::get('/test', [AdminController::class, 'index'])->name('shop.show');
// });

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

//Merchant
Route::prefix('merchant')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MerchantController::class, 'dashboard'])->name('merchant.dashboard');
    Route::post('/create-store', [MerchantController::class, 'createStore'])->name('merchant.createStore');
    Route::post('/create-category', [MerchantController::class, 'createCategory'])->name('merchant.createCategory');
    Route::post('/create-product', [MerchantController::class, 'createProduct'])->name('merchant.createProduct');
});;
