<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->level_id == 1 || Auth::user() && Auth::user()->level_id == 2) {
            return $next($request);
        } else {
            return redirect('admin/login');
        }
        
        return $next($request);
    }
}

