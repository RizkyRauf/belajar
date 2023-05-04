<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if(Auth::attempt($credentials)){
            $user = auth()->user();
            $user->last_login_at = Carbon::now();
            $user->save();

            return redirect('/dashboard')->with('success', 'Selamat datang ' . $user->name);
        }

        return redirect('/login')->with('error', 'Ada Kesalahan di Username atau password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil logout!');
    }

    public function checkSession(Request $request)
    {
        $user = auth()->user();

        if($user){
            $last_login = Carbon::parse($user->last_login_at);
            $current_time = Carbon::now();

            $diff_in_minutes = $last_login->diffInMinutes($current_time);

            if($diff_in_minutes > 180){
                Auth::logout();
                return redirect('login')->with('error', 'Session expired, please login again');
            } else {
                $user->last_login_at = Carbon::now();
                $user->save();
            }
        }

        return redirect('/dashboard');
    }
}
