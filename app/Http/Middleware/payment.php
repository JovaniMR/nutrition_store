<?php

namespace App\Http\Middleware;

use Closure;
use Cart;

class payment
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
        $userId = auth()->user()->id;
        if(Cart::session($userId)->getContent()->count() == 0){
            return redirect('/');
        }
        
        return $next($request);
    }
}
