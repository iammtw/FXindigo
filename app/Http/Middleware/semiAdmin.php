<?php

namespace App\Http\Middleware;

use Closure;

class semiAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role == "semiadmin" || $request->user()->role == "admin") {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
