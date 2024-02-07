<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth()->user()->role == '1' && Auth()->user()->is_lock == 0) {
            return route('superadmin.dashboards');
        } elseif (Auth()->user()->role == '2' && Auth()->user()->is_lock == 0) {
            return route('storeadmin.dashboards');
        } elseif (Auth()->user()->role == '3' && auth()->user()->is_lock == 0) {
            return route('factoryadmin.dashboards');
        } 
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }


    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'user_id' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt(array('user_id' => $input['user_id'],'password' => $input['password'])))
        {
                 if(auth()->user()->role == '1' && auth()->user()->is_lock == 0) {
                         return redirect()->route('superadmin.dashboards');
                 }elseif(auth()->user()->role == '2' && auth()->user()->is_lock == 0){
                        return redirect()->route('storeadmin.dashboards');
                 }elseif(auth()->user()->role == '3' && auth()->user()->is_lock == 0){
                   return redirect()->route('factoryadmin.dashboards');
                 }

        }else{
            return redirect()->route('login')->with('error', 'Please enter correct login credentials');
        }
    }
}
