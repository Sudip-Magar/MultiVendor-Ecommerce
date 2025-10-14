<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\User\Login as UserLogin;
use App\Livewire\Auth\User\Register as UserRegister;
use App\Livewire\Auth\Register;
use App\Livewire\User\Home;
use App\Livewire\Vendor\Category;
use App\Livewire\Vendor\Dashboard;
use App\Livewire\Vendor\Product\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', UserLogin::class)->name('user.login');
    Route::get('/register', UserRegister::class)->name('user.register');
});

Route::prefix('vendor')->name('vendor.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/register', Register::class)->name('register');
        Route::get('/login', Login::class)->name('login');
    });

    Route::middleware('vendor')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('category', Category::class)->name('category');
        Route::get('/product', Product::class)->name('product');
    });
});

// Public product routes
// Route::get('/', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/category/{categoryId}/products', [ProductController::class, 'categoryProducts'])->name('products.category');
// Route::get('/vendor/{vendorId}/products', [ProductController::class, 'vendorProducts'])->name('products.vendor');
