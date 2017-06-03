<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class LevelCustomer 
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
            /*if(!Auth::user()->confirmed){
                $notification = array(
                    'message' => 'Email belum diverifikasi', 
                    'alert-type' => 'danger'
                );
        
        
        return redirect('masuk')
                
                ->with($notification);
            }*/
        }
            if(Auth::guest() ){
                return redirect ('/masuk')->send();
            }
        
        return $next($request);
    }
}
