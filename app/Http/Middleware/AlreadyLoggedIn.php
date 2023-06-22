<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlreadyLoggedIn
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Session()->has('loginId') && (url('login') == $request->url() || url('register') == $request->url())){
            return back();
        }

        return $next($request);
    }
}
