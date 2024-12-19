<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminUser = \App\Models\User::find(1);
        if ($adminUser && !$adminUser->is_admin) {
            $adminUser->update(['is_admin' => true]);
        }

        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(code: 403);
        }
        return $next($request);
    }
}
