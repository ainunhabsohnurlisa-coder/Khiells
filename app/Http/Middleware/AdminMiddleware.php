<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Silakan masuk dengan akun Admin terlebih dahulu untuk membuka Dashboard.');
        }

        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Akun Anda saat ini masuk sebagai Pelanggan (' . Auth::user()->name . '). Silakan logout terlebih dahulu, lalu login dengan email Admin: admin@khiells.com');
        }

        return $next($request);
    }
}
