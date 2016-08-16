<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Custom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {

        // Check if user has the required type;
        if (Auth::user()->type == $type)
        {
            return $next($request);
        }

        return abort(403, 'Unauthorized action');

    }
}
