<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ], [
            'email.required' => 'Emailの入力がありません',
            'password.required' => 'Passwordの入力がありません',
        ]);

        $loginData = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($loginData)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'ログイン情報が正しくありません',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login_form');
    }

    
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
