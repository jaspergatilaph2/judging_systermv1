<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Judges;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        // Try admin login
        if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/admin/dashboard');
        }

        // Try judge login
        $judge = Judges::where('email', $credentials['email'])->first();

        if ($judge && $judge->password === $credentials['password']) {
            Auth::guard('judges')->login($judge);
            return redirect()->route('judges.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}
