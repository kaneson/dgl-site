<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function authenticated(Request $request, $user)
    {
      $notification = "You are signed in.";
      $type = 'success';
      $request->session()->flash('notification', $notification);
      $request->session()->flash('notification_type', $type);
      return redirect()->intended();
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
      $login = request()->input('alias');
      $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'alias';
      request()->merge([$field => $login]);
      return $field;

    }
}
