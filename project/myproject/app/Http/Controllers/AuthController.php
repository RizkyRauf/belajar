<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
    if(Auth::attempt($request->only('name', 'password'))){
        $user = auth()->user();
        return redirect('/dashboard')->with('success', 'Selamat datang ' . $user->name);
    }

    return redirect('/login')->with('error', 'Ada Kesalahan di Username atau password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil logout!');
    }
}
