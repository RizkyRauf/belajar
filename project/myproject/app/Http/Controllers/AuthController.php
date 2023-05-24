<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

            if($diff_in_minutes > 60){
                Auth::logout();
                return redirect('login')->with('error', 'Session expired, please login again');
            } else {
                $user->last_login_at = Carbon::now();
                $user->save();
            }
        }

        return redirect('/dashboard');
    }

    public function changePassword()
    {
        return view('auths.change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ],[
            'old_password.required' => 'Password tidak boleh kosong',
            'new_password.required' => 'Password tidak boleh kosong',
            'new_password.min' => 'Password tidak boleh kurang dari 8 angka',
            'new_password.confirmed' => 'New password harus sama dengan Repeat Password'
        ]);

        // Verifikasi apakah password baru yang dimasukkan sama dengan konfirmasi password
        if ($request->new_password !== $request->new_password_confirmation) {
            return back()->withErrors(['new_password' => 'The new password and confirmation password do not match']);
        }

        // Verifikasi apakah password lama yang dimasukkan oleh pengguna sesuai dengan password yang tersimpan di database
        if (! Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Kata sandi lama yang anda masukan salah', 'user' => $user]);
        }

        // Jika verifikasi berhasil, maka perbarui password pengguna
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/karyawan')->with('success', 'Password anda berhasil di rubah');
    }
}
