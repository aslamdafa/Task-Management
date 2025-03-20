<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrelloController;
use App\Http\Controllers\ForgotPasswordController; // Add this line

use App\Http\Controllers\TaskController; // Tambahkan ini
use App\Http\Controllers\OrderController; // Add OrderController
use App\Http\Controllers\VerificationController; // Add VerificationController

Route::get('/', function () {
    return view('home');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
        Route::get('', 'index')->name('dashboard');
        Route::get('/api', 'api')->name('dashboard.api');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->name('categories');
        Route::get('create', 'create')->name('categories.create');
        Route::post('store', 'store')->name('categories.store');
        Route::get('show/{id}', 'show')->name('categories.show');
        Route::get('edit/{id}', 'edit')->name('categories.edit');
        Route::put('edit/{id}', 'update')->name('categories.update');
        Route::delete('destroy/{id}', 'destroy')->name('categories.destroy');
    });

    // Add routes for orders
    Route::controller(OrderController::class)->prefix('orders')->group(function () {
        Route::get('', 'index')->name('orders.index'); // To display orders
        Route::get('create', 'create')->name('orders.create'); // To create an order
        Route::post('store', 'store')->name('orders.store'); // To store an order
        Route::get('show/{id}', 'show')->name('orders.show'); // To show an order
        Route::get('edit/{id}', 'edit')->name('orders.edit'); // To edit an order
        Route::put('edit/{id}', 'update')->name('orders.update'); // To update an order
        Route::delete('destroy/{id}', 'destroy')->name('orders.destroy'); // To delete an order
    });

    // Add routes for verifications
    Route::controller(VerificationController::class)->prefix('verifications')->group(function () {
        Route::get('', 'index')->name('verifications.index'); // To display verifications
        Route::get('create', 'create')->name('verifications.create'); // To create a verification
        Route::post('store', 'store')->name('verifications.store'); // To store a verification
        Route::get('show/{id}', 'show')->name('verifications.show'); // To show a verification
        Route::get('edit/{id}', 'edit')->name('verifications.edit'); // To edit a verification
        Route::put('edit/{id}', 'update')->name('verifications.update'); // To update a verification
        Route::delete('destroy/{id}', 'destroy')->name('verifications.destroy'); // To delete a verification
    });

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('password/update', [ForgotPasswordController::class, 'updatePassword'])
    ->name('password.update');

    Route::controller(TaskController::class)->prefix('tasks')->group(function () {
        Route::get('', 'index')->name('tasks.index'); // To display tasks
        Route::post('store', 'store')->name('tasks.store'); // To store a task
    });

    Route::get('/trello', [TrelloController::class, 'index'])->name('trello.index');


?>
