<?php

namespace App\Http\Middleware;

use Closure;

// i create this with Artisan "php artisan make:middleware MyCustomMiddleWare1"
class MyCustomMiddleWare1
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
        echo "i am the middleware function"; 
        echo "<br />";
        return $next($request);
    }

    // This is ran after the HTTP response has already been sent to the browser
    public function terminate($request, $response)
    {
        
    }
}
