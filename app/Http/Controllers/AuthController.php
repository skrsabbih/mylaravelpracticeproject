<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // register form display method
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // register form validation and store method
    public function registerStore(RegisterRequest $request)
    {
        // validate the form data
        $data = $request->validated();

        // create the registered user
        User::create($data);

        return redirect()->back()->with('success', 'Registration successful! You can now log in.');
    }

    // login form display method
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // login authentication match method
    public function loginStore(LoginRequest $request)
    {
        // credential validation
        $credentials = $request->validated();

        // check if the user exists and credentials match
        if (Auth::attempt($credentials)) {
            // authentication passed and regenerate session id for browser cookie and redirect page after login
            $request->session()->regenerate();

            

            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' => 'The email or password do not match our records.',
        ]);
    }

    // user logout method
    public function logout(HttpRequest $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
}
