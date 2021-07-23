<?php

namespace App\Http\Middleware;

use Closure;

class ExpertMiddleware
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
        if(auth()->check()&&auth()->user()->user_type==1) {

            return $next($request);
        }
        return redirect('/');
    }
}