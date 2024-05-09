<?php

namespace App\Route;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

// Admin 
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminTaskListController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminLoginController;

// Client
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\MailController;
use App\Http\Controllers\Client\MenController;
use App\Http\Controllers\Client\WomenController;
use App\Http\Controllers\Client\KidsController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\Client\ProductController;

// Auth
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\AccountController;
use App\Http\Controllers\auth\PasswordController;

Route::group(['namespace' => 'auth'], function () {
    // Login
    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.submit');
    Route::post('/logout', [SessionController::class, 'destroy']);

    // Register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::delete('/delete', [RegisterController::class, 'destroy']);

    // Reset-password
    Route::get('/password/forgot', [PasswordController::class, 'index'])->name('forgot-password');
    Route::post('/password/forgot', [PasswordController::class, 'forgot'])->name('forgot-password');
    Route::get('password/reset', [PasswordController::class, 'edit'])->name('reset-password');
    Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');
    Route::patch('/password/reset', [PasswordController::class, 'reset'])->name('password.reset');

});

Route::group(['namespace' => 'client'], function () {
    //Home
    Route::view('/', 'client.home')->name('home');

    // Men
    Route::get('/men', [MenController::class, 'index'])->name('men');
    Route::get('/men/show', [ProductController::class, 'showMenPage'])->name('men.products');

    // Women
    Route::get('/women', [WomenController::class, 'index'])->name('women');
    Route::get('/women/show', [ProductController::class, 'showMenPage'])->name('women.products');

    // Kids
    Route::get('/kids', [KidsController::class, 'index'])->name('kids');
    Route::get('/kids/show', [ProductController::class, 'showMenPage'])->name('kids.products');

    // Cart 
    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    //Search
    Route::get('/search', [SearchController::class, 'search'])->name('search');

    // Mailing
    Route::get('email/verify', [MailController::class, 'verify']);
    Route::get('test-reset-password', [MailController::class, 'resetPassword']);

    // Profile
    Route::get('/profile/{username}', [AccountController::class, 'index'])->name('account.profile');
    Route::delete('/profile/delete/{username}', [AccountController::class, 'destroy'])->name('account.delete')->middleware('auth');
});


Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
    // Home
    Route::get('/home', [AdminController::class, 'index'])->name('home_admin');

    // Product
    Route::get('/product', [AdminProductController::class, 'index'])->name('product_admin');
    Route::get('/product/createproduct', [AdminProductController::class, 'productCreate'])->name('createproduct_admin');
    Route::get('/product/orderproduct', [AdminProductController::class, 'productOrder'])->name('orderproduct_admin');
    Route::post('/product/createproduct', [AdminProductController::class, 'store']);

    // Counpon
    Route::get('/coupon', [AdminCouponController::class, 'index'])->name('coupon_admin');

    // Task List
    Route::get('/tasklist', [AdminTaskListController::class, 'index'])->name('tasklist_admin');

    // Customer
    Route::get('/customer', [AdminCustomerController::class, 'index'])->name('customer_admin');

    // Setting
    Route::get('/setting', [AdminSettingController::class, 'index'])->name('setting_admin');

    // Login
    Route::get('/login', [AdminLoginController::class, 'index'])->name('login_admin');

});

// Use this api to check if server health is good or not
Route::get('check-health', function () {
    return response()->json(['message' => 'Call URI from web'], Response::HTTP_OK);
});
