<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);
        switch (auth()->user()->email) {
            case 'aban@kec.com':

                return $next($request);
                break;
            case 'ahmed@kec.com':

                return $next($request);
                break;
            default:
                return redirect('/dashboard');
        }

    }
}
