<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // Menampilkan profil pengguna yang sedang login.
    public function profile()
    {

        $user = Auth::user(); // Mendapatkan informasi pengguna yang sedang login
        $latestBooking = Booking::with(['user', 'room'])
                                ->where('user_id', $user->id)
                                ->whereNull('actual_return_time')
                                ->orderByDesc('created_at')
                                ->first(); // Mendapatkan pemesanan terbaru pengguna

        $booking = Booking::with(['user', 'room'])
                            ->where('user_id', $user->id)
                            ->get();
        return view('profile', ['user' => $user, 'latestBooking' => $latestBooking, 'booking' => $booking]);

    }

    // Menampilkan daftar pengguna dengan role 2 yang aktif.
    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);
    }

    // Menampilkan daftar pengguna dengan role 2 yang terdaftar namun tidak aktif.
    public function registeredUser()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUsers' => $registeredUsers]);
    }

    // Menampilkan detail pengguna berdasarkan slug.
    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        $booking = Booking::with(['user', 'room',])->where('user_id', $user->id)->get();
        return view('user-detail', ['user' => $user, 'booking' => $booking]);
    }

    // Menyetujui status pengguna menjadi aktif.
    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('user-detail/'.$slug)->with('status', 'Menyetujui Pengguna Berhasil');
    }

    // Menampilkan halaman konfirmasi penghapusan pengguna.
    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }

    // Menghapus pengguna dari penyimpanan.
    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();

        return redirect('users')->with('status', 'Ban Pengguna Berhasil');
    }

    // Menampilkan daftar pengguna yang telah dibanned.
    public function bannedUser()
    {
        $bannedUsers = User::onlyTrashed()->get();
        return view('user-banned', ['bannedUsers' => $bannedUsers]);
    }

    // Menampilkan halaman untuk mengedit informasi pengguna.
    public function edit($slug = null)
    {
        // Jika slug tidak ada, berarti pengguna mengedit profil mereka sendiri
        if ($slug === null) {
            $user = Auth::user();
        } else {
            $user = User::where('slug', $slug)->first();

            // Periksa apakah pengguna adalah admin atau sedang mengedit profil mereka sendiri
            if (Auth::user()->role_id != 1 && Auth::user()->id != $user->id) {
                return redirect('profile')->with('error', 'Anda tidak memiliki izin untuk mengedit profil ini');
            }
        }

        return view('user-edit', ['user' => $user]);
    }

public function update(Request $request, $slug = null)
{
    // Jika slug tidak ada, berarti pengguna memperbarui profil mereka sendiri
    if ($slug === null) {
        $user = Auth::user();
    } else {
        $user = User::where('slug', $slug)->first();

        // Periksa apakah pengguna adalah admin atau sedang memperbarui profil mereka sendiri
        if (Auth::user()->role_id != 1 && Auth::user()->id != $user->id) {
            return redirect('profile')->with('error', 'Anda tidak memiliki izin untuk memperbarui profil ini');
        }
    }

    // Validasi data
    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'alamat' => 'required|string|max:255',
        'kategori_pengguna' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Update data pengguna menggunakan data yang telah divalidasi
    $user->update($request->except(['status', 'image']));

    // Upload dan simpan path gambar
    if ($request->hasFile('image')) {
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = $user->username . '-' . now()->timestamp . '.' . $extension;
        $request->file('image')->storeAs('public/profile_images', $newName);
        $user->image = 'profile_images/' . $newName;
    }

    // Simpan perubahan
    $user->save();

    if (Auth::user()->role_id == 1) {
        return redirect('users')->with('status', 'User Berhasil Di Edit');
    } else {
        return redirect('profile')->with('status', 'Profil berhasil diperbarui');
    }
}

    // Mengembalikan pengguna yang telah dibanned ke status aktif.
    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();

        return redirect('users')->with('status', 'Kembalikan Pengguna Berhasil');
    }
}
