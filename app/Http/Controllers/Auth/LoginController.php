<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;

class LoginController extends Controller implements HasMiddleware
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     */
    protected $redirectTo = '/home';

    /**
     * Define controller middleware (Laravel 12 style).
     */
    public static function middleware(): array
    {
        return [
            new Middleware('guest', except: ['logout']),
            new Middleware('auth', only: ['logout']),
        ];
    }

    /**
     * Override the username used for validation.
     */
    public function username(): string
    {
        return 'login';
    }

    /**
     * Allow login via email or username.
     */
    protected function credentials(Request $request): array
    {
        $login = $request->input('login');

        return filter_var($login, FILTER_VALIDATE_EMAIL)
            ? ['email' => $login, 'password' => $request->input('password')]
            : ['username' => $login, 'password' => $request->input('password')];
    }

    /**
     * Optional: Customize failed login response to show correct error.
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('login', 'remember'))
            ->withErrors([
                'login' => __('These credentials do not match our records.'),
            ]);
    }
}

