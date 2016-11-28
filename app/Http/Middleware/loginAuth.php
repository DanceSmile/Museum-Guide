<?php

namespace App\Http\Middleware;

use Closure;

class loginAuth
{
  
    public function handle($request, Closure $next)
    {
       
        if(!session("uid")){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
