<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role->nombre !== $role) {
            abort(403, 'No tienes acceso a esta sección.');
        }
        return $next($request);
    }
}
