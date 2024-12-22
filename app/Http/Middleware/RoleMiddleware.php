<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, $guard)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
