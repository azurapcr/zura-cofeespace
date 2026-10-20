<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('layout.guest.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Logika Soal 2: Jika Username == Password
        if ($username !== null && $username === $password) {
            return redirect()->route('dashboard');
        }

        // Jika tidak sama, kembalikan ke login dengan alert error
        return redirect()->route('login')->with('error', 'Username dan Password tidak cocok / salah!');
    }
}
