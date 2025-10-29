<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\User\Login as UserLogin;
use App\Livewire\Auth\User\Register as UserRegister;
use App\Livewire\User\Cart;
use App\Livewire\User\Order;
use App\Livewire\Vendor\Order as modalOrder;
use App\Livewire\User\Product as modalProduct;
use App\Livewire\Auth\Register;
use App\Livewire\User\Home;
use App\Livewire\User\ProductDetail;
use App\Livewire\Vendor\Category;
use App\Livewire\Vendor\Dashboard;
use App\Livewire\Vendor\OrderDetail;
use App\Livewire\Vendor\Product\Product;
use Illuminate\Support\Facades\Route;

use App\Livewire\Auth\Admin\Register as adminRegister;
use App\Livewire\Auth\Admin\Login as adminLogin;
use App\Livewire\Admin\Dashboard as adminDashboard;


Route::get('/', Home::class)->name('home');
Route::get('product',modalProduct::class)->name('user.product');
Route::get('/product-detail/{id}',ProductDetail::class)->name('product.detail');

Route::middleware('guest')->group(function () {
    Route::get('/login', UserLogin::class)->name('user.login');
    Route::get('/register', UserRegister::class)->name('user.register');
});

Route::middleware('web')->group(function (){
    Route::post('/logout',[AuthController::class, 'userlogout'])->name('user.logout');
    Route::get('/cart',Cart::class)->name('user.cart');
    Route::get('/order', Order::class)->name('user.order');
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
        Route::get('/order',modalOrder::class)->name('order');
        Route::get('/order-detail/{id}',OrderDetail::class)->name('orderDetail');
    });
});


Route::prefix('admin')->group(function(){
    Route::middleware('guest')->group(function(){
        Route::get('/register',adminRegister::class)->name('admin.register');
        Route::get('/login',adminLogin::class)->name('admin.login');
    });

    Route::middleware('admin')->group(function(){
        Route::get('dashboard',adminDashboard::class)->name('admin.dashboard');
    });
});