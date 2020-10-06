<?php

namespace App\Http\Middleware;

use Closure;

class VerifyDomain
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
        $referer = $request->headers->get('Referer');
        $check = url('/');

        if(strpos($referer, $check) === false){
            abort(404);
        }

        return $next($request);
    }
}
