<?php

namespace App\Http\Middleware;

use Closure;

class employeeUser
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
        if ($request->user()->role == "employee" || $request->user()->role == "admin" || $request->user()->role == "semiadmin") {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
