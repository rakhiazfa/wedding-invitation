<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     * 
     * @param LoginRequest $request
     * 
     * @return Response
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (Auth::attempt($credentials, $request->input('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email_or_username' => 'The provided credentials do not match our records.',
        ])->onlyInput('email_or_username');
    }
}
