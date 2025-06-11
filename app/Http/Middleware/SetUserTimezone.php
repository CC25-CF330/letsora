<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetUserTimezone
{
    public function handle(Request $request, Closure $next)
    {
        // Cek jika user login dan memiliki preferensi timezone
        if (Auth::check() && Auth::user()->timezone) {
            // Set zona waktu untuk sesi permintaan ini
            config(['app.timezone' => Auth::user()->timezone]);
        }

        return $next($request);
    }
}