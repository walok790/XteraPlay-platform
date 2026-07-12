<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotInstalled
{
    public static function isInstalled(): bool
    {
        return file_exists(storage_path('app/installed.lock'));
    }

    public function handle(Request $request, Closure $next): Response
    {
        // Allow the installer routes, health check, and error page assets through.
        $allowed = $request->is('install*')
            || $request->is('up')
            || $request->is('_ignition*')
            || $request->is('livewire*')
            || $request->is('storage/*');

        if (! self::isInstalled() && ! $allowed) {
            return redirect($request->getBaseUrl() . '/install');
        }

        // If already installed, don't let users visit the installer again.
        // Exception: the runImport endpoint must complete its own response,
        // but by the time we reach here for a GET request the lockfile is set
        // so any subsequent GET to /install/* is redirected home.
        if (self::isInstalled() && $request->is('install*')) {
            return redirect($request->getBaseUrl() . '/');
        }

        return $next($request);
    }
}
