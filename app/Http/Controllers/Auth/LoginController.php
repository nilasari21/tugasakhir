<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /*if(Auth::user()->level == "Admin"){
    return redirect('admin');    
    }else{
        return redirect('/machikokstore');
    }*/
    protected $redirectTo = '/machikokstore';
/*protected function redirectTo(){
    if(Auth::user()->level == "Admin"){
        return redirect('admin');
    }if(Auth::user()->level == "Customer"){
        return redirect('/machikokstore');
    }if(Auth::user()->level == "Dropshipper"){
        return redirect('/machikokstore');
    }if(Auth::user()->level == "Reseller"){
        return redirect('/machikokstore');
    }
}*/
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
