<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class LevelAdmin
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
        if(Auth::user()){
            if(Auth::user()->level != "Admin"){
                return redirect ('/forbidden');
            }
        }if(Auth::guest() ){
                return redirect ('/forbidden')->send();
            }
        
        return $next($request);
    }
}
