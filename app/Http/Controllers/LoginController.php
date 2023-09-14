<?php

namespace App\Http\Controllers;

use App\Http\Requests\login\LoginRequest;
use function session;
use function toast;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login-page');
    }
    public function loginProcess(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (auth()->attempt($credentials)) {
            return redirect()->route('/')->with('success', 'Login Success');
        }
        return redirect()->back()->with('error', 'Login Failed');
    }
    public function logout()
    {
        auth()->logout();
        session()->flush();
        session()->regenerate();
        return redirect()->route('login-page');
    }
}
