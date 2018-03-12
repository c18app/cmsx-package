<?php

namespace C18app\Cmsx\Middleware;

use Closure;

class Admin
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

        if (!\Illuminate\Support\Facades\Auth::user()->roles()->where('name', 'admin')->count()) {
            return redirect('/');
        }

        return $next($request);
    }
}