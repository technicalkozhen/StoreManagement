<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class User1
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()->role ==1){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
