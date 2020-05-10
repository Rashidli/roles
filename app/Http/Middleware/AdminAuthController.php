<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthController
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            if (Auth::guard('admin')->user()->hasPermissionTo('see admin', 'admin')) {
                return $next($request);
            }
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }
        return redirect()->route('admin.login');
    }
}
