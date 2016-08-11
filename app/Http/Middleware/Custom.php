<?php

namespace App\Http\Middleware;

use Closure;

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

        // Is logged in and has the required type
        if (auth()->check() && auth()->user()->type == $type)
        {
            return $next($request);
        }

        return redirect('/');
    }
}
