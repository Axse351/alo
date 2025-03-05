<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // Mencari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Mengecek jika user ada dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Jika valid, login user
            Auth::login($user);
            return redirect()->intended('/');
        }

        // Jika gagal login, kembali dengan pesan error
        return back()->with('alert', 'Email atau password salah.');
    }
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Menghancurkan session
        $request->session()->invalidate();

        // Mengenerate session baru untuk security
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman lainnya
        return redirect('/login');
    }
}
