<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){
        // User role
        // $role = Auth::user()->role->name; 1
        
  
        if  ( Auth::user()->hasRole('superadmin') ) {
            Session::put('myhome', '/dashboard');
            Session::put('userRole', 0);
            return '/dashboard';
        }

        if  ( Auth::user()->hasRole('admin') ) {
            Session::put('myhome', '/dashboard');
            Session::put('userRole', 1);
            return '/dashboard';
        }

        if  ( Auth::user()->hasRole('gestor') ) {
            Session::put('myhome', '/dashboard');
            Session::put('userRole', 2);
            return '/dashboard';
        }

        if  ( Auth::user()->hasRole('logistica') ) {
            Session::put('myhome', '/dashboard');
            Session::put('userRole', 3);
            return '/dashboard'; 
        }

        if  ( Auth::user()->hasRole('autorizador') ) {
            Session::put('myhome', '/dashboard');
            Session::put('userRole', 4);
            return '/dashboard'; 
        }

        if  ( Auth::user()->hasRole('peticionario') ) {
            Session::put('myhome', '/dashboard');
            Session::put('userRole', 5);
            return '/dashboard'; 
        }


    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
