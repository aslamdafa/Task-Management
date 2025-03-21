<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrelloController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VerificationController;

// Halaman Utama
Route::get('/', function () {
    return view('home');
});

// Rute untuk Autentikasi
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Rute yang Memerlukan Autentikasi
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
        Route::get('', 'index')->name('dashboard');
        Route::get('/api', 'api')->name('dashboard.api');
    });

    // Rute Untuk Pengguna Biasa (Hanya Pesanan)
    Route::controller(OrderController::class)->prefix('orders')->group(function () {
        Route::get('', 'index')->name('orders.index');
        Route::get('create', 'create')->name('orders.create');
        Route::post('store', 'store')->name('orders.store');
        Route::get('show/{id}', 'show')->name('orders.show');
        Route::get('edit/{id}', 'edit')->name('orders.edit');
        Route::put('edit/{id}', 'update')->name('orders.update');
        Route::delete('destroy/{id}', 'destroy')->name('orders.destroy');
    });

    // Profil Pengguna
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

// Rute Admin yang Memerlukan Middleware untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Rute untuk Produk
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    // Rute untuk Kategori
    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->name('categories');
        Route::get('create', 'create')->name('categories.create');
        Route::post('store', 'store')->name('categories.store');
        Route::get('show/{id}', 'show')->name('categories.show');
        Route::get('edit/{id}', 'edit')->name('categories.edit');
        Route::put('edit/{id}', 'update')->name('categories.update');
        Route::delete('destroy/{id}', 'destroy')->name('categories.destroy');
    });

    // Rute untuk Verifikasi
    Route::controller(VerificationController::class)->prefix('verifications')->group(function () {
        Route::get('', 'index')->name('verifications.index');
        Route::get('create', 'create')->name('verifications.create');
        Route::post('store', 'store')->name('verifications.store');
        Route::get('show/{id}', 'show')->name('verifications.show');
        Route::get('edit/{id}', 'edit')->name('verifications.edit');
        Route::put('edit/{id}', 'update')->name('verifications.update');
        Route::delete('destroy/{id}', 'destroy')->name('verifications.destroy');
    });
});

// Rute Reset Password
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('password/update', [ForgotPasswordController::class, 'updatePassword'])
    ->name('password.update');

// Tugas
Route::controller(TaskController::class)->prefix('tasks')->group(function () {
    Route::get('', 'index')->name('tasks.index');
    Route::post('store', 'store')->name('tasks.store');
});

// Trello
Route::get('/trello', [TrelloController::class, 'index'])->name('trello.index');

?>