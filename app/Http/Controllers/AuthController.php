<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('login');
    }

    // Memproses autentikasi login
    public function authenticating(Request $request)
    {
        // Validasi inputan login
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Cek apakah login valid
        if (Auth::attempt($credentials)) {
            // Cek apakah user status = active
            if(Auth::user()->status != 'active'){
                // Logout user jika status tidak aktif
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                // Set pesan flash untuk status dan pesan gagal
                Session::flash('status', 'failed');
                Session::flash('message', 'Akun Anda Belum Di Setujui Oleh Admin!');
                return redirect('/login');
            }

            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Redirect sesuai role user
            if(Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if(Auth::user()->role_id == 2) {
                return redirect('profile');
            }
            // return redirect();
        }

        // Set pesan flash untuk login gagal
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Gagal!');
        return redirect('/login');
    }

    // Menampilkan halaman register
    public function register()
    {
        return view('register');
    }

    // Memproses registrasi
    public function registerProcess(Request $request)
    {
        // Validasi inputan registrasi
        $validated = $request->validate([
            'username'                => 'required|unique:users|max:255',
            'image'                   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password'                => 'required|max:255',
            'phone'                   => 'max:255',
            'alamat'                  => 'max:255',
            'kategori_pengguna'       => 'max:255',
        ]);

        // Buat user baru
        $user = User::create($request->all());

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $user->username . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('public/profile_images', $newName);
            $user->image = 'profile_images/' . $newName;
            $user->save();
        }

        // Set pesan flash untuk registrasi berhasil
        Session::flash('status', 'success');
        Session::flash('message', 'Berhasil Daftar, Tunggu Admin Untuk Menyetujui');
        return redirect('register');
    }

     // Memproses logout
     public function logout(Request $request)
     {
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect('/');
     }
}
