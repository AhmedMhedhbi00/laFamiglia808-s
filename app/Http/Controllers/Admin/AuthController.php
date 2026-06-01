<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Credentials stored in .env for simplicity (no users table needed)
    // ADMIN_EMAIL and ADMIN_PASSWORD in .env

    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $adminEmail    = config('admin.email', env('ADMIN_EMAIL', 'admin@lafamiglia808.com'));
        $adminPassword = config('admin.password', env('ADMIN_PASSWORD', 'lafamiglia808'));

        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            session(['admin_logged_in' => true, 'admin_email' => $request->email]);
            return redirect()->route('admin.dashboard')->with('success', 'Bentornato!');
        }

        return back()->withErrors(['email' => 'Credenziali non valide.'])->withInput();
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_email']);
        return redirect()->route('admin.login')->with('success', 'Logout effettuato.');
    }
}
