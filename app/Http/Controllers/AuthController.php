<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Owners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function submit_login(Request $request)
    {
        // Validasi Input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek Kredensial User
        $credentials = $request->only('username', 'password');

        // Cek apakah username ada di tabel petugas
        $admin = Admin::where('username', $request->username)->first();
        if ($admin && Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin')->with('success', 'Login berhasil! Sebagai Admin');
        }

        $owner = Owners::where('username', $request->username)->first();
        if ($owner && Auth::guard('owner')->attempt($credentials)) {
            return redirect()->route('home_owner')->with('success', 'Login berhasil! Sebagai Owners');
        }

        // Cek apakah username ada di tabel masyarakat
        $user = User::where('username', $request->username)->first();
        if ($user && Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login berhasil! Sebagai User');
        }

        // Kembalikan jika login gagal
        return back()->withErrors(['username' => 'Username atau password salah.'])->withInput();
    }

    // Fungsi logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Berhasil Log Out!');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'nama_lengkap' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'alamat' => 'required|string|max:255',
                'no_hp' => 'required|string|max:15',
                'password' => 'required|string|min:3',
            ]);
        // Buat user baru
        User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password), // Enkripsi Password
        ]);

        return redirect()->route('login')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
