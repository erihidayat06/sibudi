<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $judul = 'Login';
        return view('auth.loginAdmin.login', [
            'judul' => $judul
        ]);
    }

    public function authenticate(Request $request)
    {

        $credential = $request->validate([
            "name" => 'required',
            "password" => 'required'
        ]);


        if (Auth::attempt($credential)) {
            // Pengecekan peran pengguna setelah berhasil login
            if (auth()->user()->admin == True) {
                return redirect()->intended('/'); // Ganti dengan rute atau URL yang sesuai
            } else {
                Auth::logout();
                return redirect('/login-admin')->withErrors(['role' => 'You do not have admin privileges.']);
            }
        }

        // if (Auth::attempt($credential)) {
        //     $request->session()->regenerate();

        //     if (auth()->user()->admin != 1) {
        //         Auth::logout();

        //         $request->session()->invalidate();

        //         $request->session()->regenerateToken();

        //         return redirect()->back();
        //     }
        //     return redirect()->intended('/');
        // }

        return back()->with('warning', 'Email Atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
