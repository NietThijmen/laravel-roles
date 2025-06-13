<?php

namespace NietThijmen\LaravelRoles\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = $request->user();
        if (! $user) {
            abort(403);
        }

        if (! method_exists($user, 'hasRole')) {
            Log::error("User model does not have a 'hasRole' method.");

            abort(500);
        }

        if (! $user->hasRole($role)) {
            Log::warning("User with ID {$user->id} attempted to access a route requiring the '{$role}' role.");

            abort(403);
        }

        return $next($request);
    }
}
