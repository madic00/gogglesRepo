<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
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
        if(!$request->session()->has('user')) {
            return redirect()->route('login');
        }

        if($request->session()->get('user')->role_id != 1) {
            return redirect()->route('home.products');
        }
        
        return $next($request);

    }
}
