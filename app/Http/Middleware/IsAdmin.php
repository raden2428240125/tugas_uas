<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && str_contains(strtolower(auth()->user()->email), 'admin')) {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'Akses Ditolak! Halaman ini hanya untuk Admin SIPA.');
    }
}
