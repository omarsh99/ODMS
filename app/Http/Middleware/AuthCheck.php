<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        if (env('APP_ENV') === 'testing') {
            return $next($request);
        }

        if(!Session()->has('loginId')){
            return redirect('login')->with('fail', 'You have to be logged in to view this page!');
        }
        return $next($request);
    }
}
