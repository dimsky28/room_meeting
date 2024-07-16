<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoomBookingController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $rooms = Room::all();
        return view('room-booking', ['users' => $users, 'rooms' => $rooms]);
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'booking_time' => 'required|date_format:Y-m-d H:i:s',
            'return_time' => 'required|date_format:Y-m-d H:i:s',  // Validasi format tanggal dan waktu

        ]);
        // $request['booking_time'] = Carbon::now()->toDateTimeString();
        // $request['return_time'] = Carbon::now()->addHours(3)->toDateTimeString();

        $room = Room::findOrFail($request->room_id)->only('status');

        if($room['status'] != 'ready'){
            Session::flash('message', 'Ruangan Penuh! Tidak Bisa Memesan!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('room-booking');
        }
        else{
            try {
                DB::beginTransaction();
                //process insert to booking table
                Booking::create($request->all());
                //process update room table
                $room = Room::findOrFail($request->room_id);
                $room->status = 'full';
                $room->save();
                DB::commit();

                Session::flash('message', 'Berhasil Memesan Ruangan');
                Session::flash('alert-class', 'alert-success');
                return redirect('room-booking');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        }

    }

    public function adminReturnRoom()
{
    $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
    $rooms = Room::all();
    return view('admin-room-return', ['users' => $users, 'rooms' => $rooms]);
}

public function saveAdminReturnRoom(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'room_id' => 'required|exists:rooms,id',
    ]);

    $booking = Booking::where('user_id', $request->user_id)
                      ->where('room_id', $request->room_id)
                      ->whereNull('actual_return_time')
                      ->first();

    if ($booking) {
        $booking->actual_return_time = Carbon::now()->toDateTimeString();
        $booking->save();

        $room = Room::findOrFail($request->room_id);
        $room->status = 'ready';
        $room->save();

        Session::flash('message', 'Mengembalikan Ruangan Berhasil');
        Session::flash('alert-class', 'alert-success');
    } else {
        Session::flash('message', 'Gagal Mengembalikan Ruangan!');
        Session::flash('alert-class', 'alert-danger');
    }

    return redirect('admin-room-return');
}

    public function returnRoom()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $rooms = Room::all();
        return view('room-return', ['users' => $users, 'rooms' => $rooms]);
    }

    public function saveReturnRoom(Request $request)
    {
        $validated = $request->validate([
            'actual_return_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        // user & room yang dipilih untuk return benar, maka berhasil return room
        // user & room yang dipilih untuk return salah, maka muncul error notice
        $booking = Booking::where('user_id', $request->user_id)->where('room_id', $request->room_id)
        ->where('actual_return_time', null);
        $bookingData = $booking->first();
        $countData = $booking->count();

        if($countData == 1) {
            // return room (berhasil)
            $bookingData->actual_return_time = $request->actual_return_time;
            $bookingData->save();

            // Update room status to ready
            $room = Room::findOrFail($request->room_id);
            $room->status = 'ready';  // Update
            $room->save();

            Session::flash('message', 'Mengembalikan Ruangan Berhasil');
            Session::flash('alert-class', 'alert-success');
            return redirect('room-return');
        }
        else{
            // erorr notice (gagal)
            Session::flash('message', 'Gagal Mengembalikan Ruangan!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('room-return');
        }
    }
}
