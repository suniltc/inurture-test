<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
Use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if($user && $user->hasRole(['user'])){
            if (Auth::attempt([
                'email' => $email,
                'password' => $password,
            ])) {
                // Authentication passed
                return redirect()->intended('home');
            }
            else
            {
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.failed')],
                ])->redirectTo('login');
            }
        }
        elseif($user && $user->hasRole(['admin'])){
            if (Auth::attempt([
                'email' => $email,
                'password' => $password,
            ])) {
                // Authentication passed
                return redirect()->intended('dashboard');
            }
            else
            {
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.failed')],
                ])->redirectTo('login');
            }
        }
        else
        {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ])->redirectTo('login');
        }
    }
}
