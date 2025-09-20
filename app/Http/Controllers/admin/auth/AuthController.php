<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{

    public function login()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (auth()->attempt($request->only('email', 'password'))) {
            if (auth()->user()->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                auth()->logout();
                return redirect('/admin/login')->with('error', 'Unauthorized access');
            }
        }
        return redirect()->route('admin.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login')->with('success', 'Logged out successfully');
    }
}
