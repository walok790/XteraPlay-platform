<?php

namespace App\Providers;

use App\Models\LandingNav;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Safety net for the installer: if the app hasn't been installed yet
        // (no lockfile), force file-based session/cache and mysql as the DB
        // driver so the installer wizard can always boot — even if the user's
        // .env is missing values or has stale defaults from Laravel 12's
        // sqlite-first configuration. Once installed, this block is skipped
        // and normal .env values apply.
        if (! file_exists(storage_path('app/installed.lock'))) {
            config([
                'session.driver' => 'file',
                'cache.default' => 'file',
                'database.default' => env('DB_CONNECTION', 'mysql'),
            ]);
        }
    }

    public function boot(): void
    {
        // Share landing page nav links with all views that use the main layout.
        // Wrapped in try/catch so this doesn't break when the DB isn't ready
        // (e.g., during migrations or on fresh installs).
        View::composer('layouts.app', function ($view) {
            try {
                $view->with('landing_nav_links', LandingNav::visible()->ordered()->get());
            } catch (\Throwable $e) {
                $view->with('landing_nav_links', collect());
            }
        });
    }
}
