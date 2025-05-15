<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if user is authenticated and has 'admin' role
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // Optionally redirect or abort
        // abort(403, 'Unauthorized action.');
        redirect()->route('home');
    }
}
