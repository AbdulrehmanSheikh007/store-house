<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;

class LoginController extends Controller {
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
        return redirect('login')->with(Auth::logout());
    }

    public function loginForm() {
        return view("auth.login");
    }
    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Success
            Session::flash("success", "Welcome, you are successfully login.");
            return redirect('dashboard');
        } else {
            Session::flash("error", "Sorry, your credentials are invalid.");
            return redirect()->back();
        }
    }

}
