<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class User3
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()->role ==3){
            return redirect()->route('login');
        }

        return $next($request);
    }
}
