<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($credentials['email'] === 'admin@mallsampah.com' && $credentials['password'] === 'admin123') {
            session(['is_logged_in' => true]); // Menandai sesi sebagai sudah login
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // Auth::logout(); // Tidak digunakan karena kita tidak pakai Auth::attempt
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}