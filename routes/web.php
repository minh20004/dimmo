<?php

use App\Http\Controllers\AdminAccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [MasterController::class, 'client'])->name('client');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===============================user========================================
Route::get('/shop/category/{id}', [MasterController::class, 'shopByCategory'])->name('shop.category');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');




// ==============================================================================

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin', function () {
    if (Auth::guard('admin')->check()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('admin.login');
});

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::patch('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');

// Route::resource('categories', CategoryController::class);
Route::resource('categories', CategoryController::class)->except(['show']);

Route::resource('products', ProductController::class)->except(['show']);
//danh mục bị xóa
Route::prefix('categories')->group(function () {
    Route::get('/trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
    Route::post('/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
});
// sản phẩm bị xóa 
// Trong file web.php
Route::get('products/trashed', [ProductController::class, 'trashed'])->name('product.trashed');
Route::post('products/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');

// Admin management routes
Route::resource('admin-accounts', AdminAccountController::class);

// Admin Auth Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (không yêu cầu đăng nhập)
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminAccountController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminAccountController::class, 'login'])->name('login.post');
    });

    // Protected routes (yêu cầu đăng nhập)
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminAccountController::class, 'dashboard'])->name('dashboard');
        Route::post('logout', [AdminAccountController::class, 'logout'])->name('logout');
        // ... other admin routes ...
    });
});