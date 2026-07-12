<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallerController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// ============ INSTALLER ============
Route::prefix('install')->group(function () {
    Route::get('/', [InstallerController::class, 'welcome']);
    Route::get('/requirements', [InstallerController::class, 'requirements'])->name('install.requirements');
    Route::get('/permissions', [InstallerController::class, 'permissions'])->name('install.permissions');
    Route::get('/database', [InstallerController::class, 'database'])->name('install.database');
    Route::post('/database', [InstallerController::class, 'testDatabase']);
    Route::get('/mode', [InstallerController::class, 'mode'])->name('install.mode');
    Route::post('/mode', [InstallerController::class, 'saveMode']);
    Route::get('/admin', [InstallerController::class, 'admin'])->name('install.admin');
    Route::post('/admin', [InstallerController::class, 'saveAdmin']);
    Route::get('/import', [InstallerController::class, 'import'])->name('install.import');
    Route::post('/import/run', [InstallerController::class, 'runImport'])->name('install.import.run');
});

// ============ PUBLIC ============
Route::get('/', [LandingPageController::class, 'index'])->name('home.landing');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

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
        ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'sendVerificationEmail'])
        ->middleware('throttle:6,1')->name('verification.send');

    // App pages
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/subscription', fn () => view('subscription', ['plans' => \App\Models\Plan::active()->ordered()->get()]))->name('subscription');
    Route::get('/bookmarks', fn () => view('bookmarks'))->name('bookmarks');
    Route::get('/history', fn () => view('history'))->name('history');
    Route::get('/transactions', fn () => view('transactions', ['transactions' => \App\Models\Transaction::where('user_id', auth()->id())->latest()->get()]))->name('transactions');

    // Support tickets
    Route::get('/support', [TicketController::class, 'index'])->name('support');
    Route::post('/support', [TicketController::class, 'store'])->name('support.store');
    Route::get('/support/{ticket}', [TicketController::class, 'show'])->name('support.show');

    // Reviews (submit)
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

// ============ ADMIN AUTH (Guest) ============
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
});

// ============ ADMIN PROTECTED ============
Route::prefix('admin')->middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Plans
    Route::get('/plans', [PlanController::class, 'index'])->name('admin.plans');
    Route::get('/plans/create', [PlanController::class, 'create'])->name('admin.plans.create');
    Route::post('/plans', [PlanController::class, 'store'])->name('admin.plans.store');
    Route::get('/plans/{plan}/edit', [PlanController::class, 'edit'])->name('admin.plans.edit');
    Route::put('/plans/{plan}', [PlanController::class, 'update'])->name('admin.plans.update');
    Route::delete('/plans/{plan}', [PlanController::class, 'destroy'])->name('admin.plans.destroy');

    // Subscriptions
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('admin.subscriptions');
    Route::post('/subscriptions/{subscription}/cancel', [SubscriptionController::class, 'cancel'])->name('admin.subscriptions.cancel');

    // Coupons
    Route::get('/coupons', [CouponController::class, 'index'])->name('admin.coupons');
    Route::get('/coupons/create', [CouponController::class, 'create'])->name('admin.coupons.create');
    Route::post('/coupons', [CouponController::class, 'store'])->name('admin.coupons.store');
    Route::get('/coupons/{coupon}/edit', [CouponController::class, 'edit'])->name('admin.coupons.edit');
    Route::put('/coupons/{coupon}', [CouponController::class, 'update'])->name('admin.coupons.update');
    Route::delete('/coupons/{coupon}', [CouponController::class, 'destroy'])->name('admin.coupons.destroy');

    // Reviews
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews');
    Route::post('/reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('admin.reviews.approve');
    Route::post('/reviews/{review}/reject', [AdminReviewController::class, 'reject'])->name('admin.reviews.reject');
    Route::post('/reviews/{review}/featured', [AdminReviewController::class, 'toggleFeatured'])->name('admin.reviews.featured');
    Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');

    // Support Tickets
    Route::get('/support', [AdminTicketController::class, 'index'])->name('admin.support');
    Route::get('/support/{ticket}', [AdminTicketController::class, 'show'])->name('admin.support.show');
    Route::post('/support/{ticket}/reply', [AdminTicketController::class, 'reply'])->name('admin.support.reply');
    Route::post('/support/{ticket}/status', [AdminTicketController::class, 'updateStatus'])->name('admin.support.status');
    Route::delete('/support/{ticket}', [AdminTicketController::class, 'destroy'])->name('admin.support.destroy');

    // Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages');
    Route::post('/messages/{message}/read', [MessageController::class, 'markRead'])->name('admin.messages.read');
    Route::post('/messages/{message}/replied', [MessageController::class, 'markReplied'])->name('admin.messages.replied');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');

    // Currencies
    Route::get('/currencies', [CurrencyController::class, 'index'])->name('admin.currencies');
    Route::post('/currencies', [CurrencyController::class, 'store'])->name('admin.currencies.store');
    Route::put('/currencies/{currency}', [CurrencyController::class, 'update'])->name('admin.currencies.update');
    Route::delete('/currencies/{currency}', [CurrencyController::class, 'destroy'])->name('admin.currencies.destroy');

    // Announcements
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('admin.announcements');
    Route::post('/announcements', [AnnouncementController::class, 'store'])->name('admin.announcements.store');
    Route::put('/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('admin.announcements.update');
    Route::post('/announcements/{announcement}/toggle', [AnnouncementController::class, 'toggle'])->name('admin.announcements.toggle');
    Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('admin.announcements.destroy');

    // Landing Page Management
    Route::get('/landing', [LandingController::class, 'index'])->name('admin.landing');
    Route::post('/landing/sections', [LandingController::class, 'updateSections'])->name('admin.landing.sections');
    Route::post('/landing/content', [LandingController::class, 'updateContent'])->name('admin.landing.content');
    Route::post('/landing/features', [LandingController::class, 'storeFeature'])->name('admin.landing.features.store');
    Route::put('/landing/features/{feature}', [LandingController::class, 'updateFeature'])->name('admin.landing.features.update');
    Route::post('/landing/features/{feature}/toggle', [LandingController::class, 'toggleFeature'])->name('admin.landing.features.toggle');
    Route::delete('/landing/features/{feature}', [LandingController::class, 'destroyFeature'])->name('admin.landing.features.destroy');
    Route::post('/landing/navs', [LandingController::class, 'storeNav'])->name('admin.landing.navs.store');
    Route::put('/landing/navs/{nav}', [LandingController::class, 'updateNav'])->name('admin.landing.navs.update');
    Route::post('/landing/navs/{nav}/toggle', [LandingController::class, 'toggleNav'])->name('admin.landing.navs.toggle');
    Route::delete('/landing/navs/{nav}', [LandingController::class, 'destroyNav'])->name('admin.landing.navs.destroy');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::put('/settings', [SettingController::class, 'update'])->name('admin.settings.update');

    // System Info
    Route::get('/system', fn () => view('admin.system'))->name('admin.system');
});
