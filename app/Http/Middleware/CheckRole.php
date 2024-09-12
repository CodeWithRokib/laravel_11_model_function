<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $user = Auth::user();

        // Check if the authenticated user has one of the required roles
        if (!in_array($user->role, $roles)) {
            // Redirect to a custom "403 Forbidden" page or any route you want
            return redirect()->route('forbidden')->with('error', 'You do not have permission to access this section.');
        }

        return $next($request);
    }
}
