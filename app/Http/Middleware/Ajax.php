<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Ajax
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
        if ($request->ajax()) {
            return $next($request);
        }
        abort(404);
    }
}
