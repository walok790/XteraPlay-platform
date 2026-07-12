<?php

use App\Http\Controllers\AuthController;
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
