<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Judges;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Try to log in as admin (default)
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/home');
        }

        // Try to log in as judge (plain password check)
        $judge = Judges::where('email', $credentials['email'])
            ->where('password', $credentials['password']) // plain text check
            ->first();

        if ($judge) {
            Auth::login($judge); // You may need a custom guard for judges
            return redirect()->route('judges.dashboard');
        }

        // If both fail
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}
