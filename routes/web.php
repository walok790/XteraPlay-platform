<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('landing');
});

// Public routes
Route::get('/contact', fn() => view('contact'))->name('contact');

// Auth Routes (Guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Auth Routes (Logged in)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/home', fn() => view('home'))->name('home');
    Route::get('/subscription', fn() => view('subscription'))->name('subscription');
    Route::get('/bookmarks', fn() => view('bookmarks'))->name('bookmarks');
    Route::get('/history', fn() => view('history'))->name('history');
    Route::get('/support', fn() => view('support'))->name('support');
});

// Admin Auth
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
});

// Admin Protected Routes
Route::prefix('admin')->middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/users', fn() => view('admin.users'))->name('admin.users');
    Route::get('/subscriptions', fn() => view('admin.subscriptions'))->name('admin.subscriptions');
    Route::get('/coupons', fn() => view('admin.coupons'))->name('admin.coupons');
    Route::get('/reviews', fn() => view('admin.reviews'))->name('admin.reviews');
    Route::get('/support', fn() => view('admin.support'))->name('admin.support');
    Route::get('/messages', fn() => view('admin.messages'))->name('admin.messages');
    Route::get('/currencies', fn() => view('admin.currencies'))->name('admin.currencies');
    Route::get('/settings', fn() => view('admin.settings'))->name('admin.settings');
    Route::get('/system', fn() => view('admin.system'))->name('admin.system');
});
