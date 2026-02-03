<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\resetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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
    public function logout(Request $request)
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

    public function forgotPasswordStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function resetPasswordStore(resetPasswordRequest $request)
    {

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Your password has been reset successfully!')
            : back()->withErrors(['email' => __($status)]);
    }
}
