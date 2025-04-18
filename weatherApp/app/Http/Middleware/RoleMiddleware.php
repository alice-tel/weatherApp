<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param string $role
     */
    public function handle(Request $request, Closure $next, $role)
    {

        // Adjust this to check the role as a string or integer, rather than looking for a class.
        if (!auth()->check() || auth()->user()->user_role != $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
