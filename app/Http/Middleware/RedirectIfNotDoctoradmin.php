<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotDoctoradmin
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'doctoradmin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('doctoradmin/login');
        }

        return $next($request);
    }

}
