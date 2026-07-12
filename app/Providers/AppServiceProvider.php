<?php

namespace App\Providers;

use App\Models\LandingNav;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
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
