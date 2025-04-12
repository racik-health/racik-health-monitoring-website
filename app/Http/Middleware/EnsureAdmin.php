<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Anda harus login terlebih dahulu');
        }

        if (!auth()->user()->hasRole('admin')) {
            if (auth()->user()->hasRole('patient')) {
                return redirect()->route('home')->with('error', 'Akses tidak diizinkan. Halaman ini hanya dapat diakses oleh admin');
            }

            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
