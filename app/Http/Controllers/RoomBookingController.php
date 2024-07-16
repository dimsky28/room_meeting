<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoomBookingController extends Controller
{
    public function index()
    {
        // Mengambil semua pengguna kecuali pengguna yang sedang terautentikasi dan yang memiliki status 'inactive'
        $users = User::where('id', Auth::user()->id)
                     ->where('status', '!=', 'inactive')
                     ->get();
        // Mengambil semua ruangan yang statusnya 'ready'
        $rooms = Room::where('status', 'ready')->get();
        return view('room-booking', ['users' => $users, 'rooms' => $rooms]);
    }

    public function store(Request $request)
    {
        // Validasi format tanggal dan waktu untuk booking_time dan return_time
        $validated = $request->validate([

            'booking_time' => 'required|date_format:Y-m-d H:i:s',
            'return_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        // Cek apakah return_time lebih awal dari booking_time
        if (strtotime($request->return_time) < strtotime($request->booking_time)) {
            Session::flash('message', 'Tanggal pengembalian harus setelah tanggal pemesanan.');
            Session::flash('alert-class', 'alert-danger');
            return redirect('room-booking')->withInput();
        }


        // Mengambil status ruangan berdasarkan room_id yang diberikan
        $room = Room::findOrFail($request->room_id)->only('status');

        // Memeriksa apakah ruangan tersedia
        if ($room['status'] != 'ready') {
            // Jika tidak tersedia, tampilkan pesan ruangan penuh
            Session::flash('message', 'Ruangan Penuh! Tidak Bisa Memesan!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('room-booking');
        } else {
            try {
                // Memulai transaksi database
                DB::beginTransaction();
                // Menyimpan data pemesanan ke tabel bookings
                Booking::create($request->all());
                // Memperbarui status ruangan menjadi 'full'
                $room = Room::findOrFail($request->room_id);
                $room->status = 'full';
                $room->save();
                // Mengkomit transaksi database
                DB::commit();

                // Menampilkan pesan berhasil memesan ruangan
                Session::flash('message', 'Berhasil Memesan Ruangan');
                Session::flash('alert-class', 'alert-success');
                return redirect('room-booking');
            } catch (\Throwable $th) {
                // Membatalkan transaksi jika terjadi kesalahan
                DB::rollBack();
                // Pertimbangkan untuk menambahkan logging di sini untuk kesalahan yang terjadi
                Session::flash('message', 'Terjadi Kesalahan! Silahkan Coba Lagi.');
                Session::flash('alert-class', 'alert-danger');
                return redirect('room-booking');
            }
        }
    }

    public function adminReturnRoom()
    {
        // Mengambil semua pengguna kecuali admin (id = 1) dan pengguna dengan status 'inactive'
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        // Mengambil semua ruangan
        $rooms = Room::all();
        return view('admin-room-return', ['users' => $users, 'rooms' => $rooms]);
    }

    public function saveAdminReturnRoom(Request $request)
    {
        // Validasi data yang dimasukkan
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
        ]);

        // Mencari booking yang sesuai dengan user_id dan room_id yang diberikan dan belum dikembalikan
        $booking = Booking::where('user_id', $request->user_id)
                          ->where('room_id', $request->room_id)
                          ->whereNull('actual_return_time')
                          ->first();

        if ($booking) {
            // Jika booking ditemukan, perbarui actual_return_time dan status ruangan
            $booking->actual_return_time = Carbon::now()->toDateTimeString();
            $booking->save();

            $room = Room::findOrFail($request->room_id);
            $room->status = 'ready';
            $room->save();

            Session::flash('message', 'Mengembalikan Ruangan Berhasil');
            Session::flash('alert-class', 'alert-success');
        } else {
            // Jika tidak ditemukan, tampilkan pesan gagal
            Session::flash('message', 'Gagal Mengembalikan Ruangan!');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('admin-room-return');
    }

    public function returnRoom()
    {
        $users = User::where('id', Auth::user()->id)
                     ->where('status', '!=', 'inactive')
                     ->get();

        // Mengambil semua ruangan
        $rooms = Room::all();
        return view('room-return', ['users' => $users, 'rooms' => $rooms]);
    }

    public function saveReturnRoom(Request $request)
    {
        // Validasi actual_return_time yang dimasukkan
        $validated = $request->validate([
            'actual_return_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        // Mencari booking yang sesuai dengan user_id dan room_id yang belum dikembalikan
        $booking = Booking::where('user_id', $request->user_id)
                          ->where('room_id', $request->room_id)
                          ->whereNull('actual_return_time');
        $bookingData = $booking->first();
        $countData = $booking->count();

        if ($countData == 1) {

            // Cek apakah actual_return_time lebih awal dari booking_time
            if (strtotime($request->actual_return_time) < strtotime($bookingData->booking_time)) {
                Session::flash('message', 'Tanggal pengembalian harus setelah tanggal pemesanan.');
                Session::flash('alert-class', 'alert-danger');
                return redirect('room-return')->withInput();
            }

            // Jika booking ditemukan, perbarui actual_return_time dan status ruangan
            $bookingData->actual_return_time = $request->actual_return_time;
            $bookingData->save();

            $room = Room::findOrFail($request->room_id);
            $room->status = 'ready';
            $room->save();

            Session::flash('message', 'Ruangan Berhasil Dikembalikan');
            Session::flash('alert-class', 'alert-success');
            return redirect('room-return');
        } else {
            // Jika booking tidak ditemukan, tampilkan pesan gagal
            Session::flash('message', 'Gagal Mengembalikan Ruangan!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('room-return');
        }
    }
}


