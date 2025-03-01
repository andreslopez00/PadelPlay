<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Usuario no autenticado.');
        }

        if (!Auth::user()->is_admin) {
            return redirect('/')->with('error', 'No tienes permisos de administrador.');
        }

        return $next($request);
    }
}
