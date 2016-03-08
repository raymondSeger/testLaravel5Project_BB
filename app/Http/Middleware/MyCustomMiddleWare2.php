<?php

namespace App\Http\Middleware;

use Closure;

class MyCustomMiddleWare2
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
        echo "i am custom middleware 2";
        echo "<br />";
        return $next($request);
    }
}
