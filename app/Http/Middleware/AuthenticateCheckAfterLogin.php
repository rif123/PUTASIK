<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;
use Closure;

class AuthenticateCheckAfterLogin
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    public function handle($request, Closure $next)
    {
        if (!empty(\Session::get('key'))) {
    	
           return redirect('/admin');
        }
         return $next($request);
    }

    
}
