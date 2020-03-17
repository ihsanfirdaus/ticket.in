<?php

namespace App\Http\Middleware;

use Closure;
use Laratrust\LaratrustFacade as Laratrust;
class AdminMiddleware
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
        if(Laratrust::hasRole('member')){
            return redirect('/');
        }
        return $next($request);
    }
}
