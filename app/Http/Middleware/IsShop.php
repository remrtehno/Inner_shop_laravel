<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsShop
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
	
	//prevent to abort
	    return $next($request);
    	// check user is shop?
           if(Auth::user()->is_shop){

             return $next($request);
           }
           else{

            abort("404");
           }
           
        


    }
}
