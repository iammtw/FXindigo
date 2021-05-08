<?php

namespace App\Http\Middleware;

use Closure;

class AllAdminType
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
        if (Auth::user()->role == "semiadmin" || $request->user()->role == "admin" || $request->user()->role == "employee") {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
