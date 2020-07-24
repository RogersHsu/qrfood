<?php

namespace App\Http\Middleware;

use Closure;

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
        if ( $request->user()->role == 2){
            
            return $next($request);

        }else{

            // return redirect()->back()->withInput();
            // return redirect()->route('logout');
            return redirect()->route('login');

        }
    }
}
