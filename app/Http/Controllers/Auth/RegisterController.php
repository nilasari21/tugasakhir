<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Hash,Mail;
use Validator, Redirect, Session;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create()
    {
            $rules = [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|confirmed|min:6',
        ];
 
        $input = Input::only(
            'name',
            'email',
            'password',
            'password_confirmation'
        );
 
        $validator = Validator::make($input, $rules);
 
        if($validator->fails())
        {
          return Redirect::to('daftar')->withInput()->withErrors($validator);
        }

        $confirmation_code = str_random(30);
 
        $user = User::create([
        // return User::create([
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            // 'confirmation_code' => $confirmation_code,
            'no_hp' => Input::get ('nohp'),
            
            'konfirm_admin' => Input::get('konfirm'),
            'level' => Input::get('level'),
            ]);
     /* Mail::send('auth.verify', ['confirmation_code' => $confirmation_code], function($m) {
            $m->from('admin1@admin.com', 'Toko');
            $m->to(Input::get('email'), Input::get('name'))
                ->subject('Konfirmasi alamat email anda');
        });
 */
        Session::flash('message', 'Terima kasih telah mendaftar! Silahkan login.');
        // ]);
        return Redirect::to('daftar');
    }
// }
     public function confirm($confirmation_code)
    {
        if(!$confirmation_code)
        {
            return "link tidak terdaftar";
        }
 
        $user = User::where('confirmation_code', $confirmation_code)->first();
 
        if (!$user)
        {
            return "link tidak terdaftar";
        }
 
        $user->confirmed  = 1;
        $user->confirmation_code = null;
        $user->save();
 
        Session::flash('message', 'Akun anda telah berhasil di verifikasi, silahkan login!');
 
        return Redirect::to('masuk');
    }
}
