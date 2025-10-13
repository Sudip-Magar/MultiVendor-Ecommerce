<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Vendor\Category;
use App\Livewire\Vendor\Dashboard;
use App\Http\Controllers\ProductController;
use App\Livewire\Vendor\Product\Product;
use Illuminate\Support\Facades\Route;





Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', Register::class)->name('register');
        Route::get('/login', Login::class)->name('login');
    });

    Route::middleware('vendor')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('category', Category::class)->name('category');
        Route::get('/product', Product::class)->name('product');
    });
});

// Public product routes
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category/{categoryId}/products', [ProductController::class, 'categoryProducts'])->name('products.category');
Route::get('/vendor/{vendorId}/products', [ProductController::class, 'vendorProducts'])->name('products.vendor');
