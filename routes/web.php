<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

// ============ PUBLIC ============
Route::get('/', fn() => view('landing'));
Route::get('/contact', fn() => view('contact'))->name('contact');

// ============ GUEST AUTH ============
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Password Reset
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// ============ AUTHENTICATED USERS ============
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Email verification
    Route::get('/email/verify', [AuthController::class, 'showVerifyEmail'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'sendVerificationEmail'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // App pages
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/home', fn() => view('home'))->name('home');
    Route::get('/subscription', fn() => view('subscription'))->name('subscription');
    Route::get('/bookmarks', fn() => view('bookmarks'))->name('bookmarks');
    Route::get('/history', fn() => view('history'))->name('history');
    Route::get('/support', fn() => view('support'))->name('support');
});

// ============ ADMIN AUTH ============
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
});

// ============ ADMIN PROTECTED ============
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
