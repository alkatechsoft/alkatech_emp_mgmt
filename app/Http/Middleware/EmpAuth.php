<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmpAuth
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
        if($request->session()->has('USER_LOGIN')){
            
        } else {
            $request->session()->flash('error','Access denied');
            return redirect ('user');
         }
        return $next($request);
   
   
    }
}
