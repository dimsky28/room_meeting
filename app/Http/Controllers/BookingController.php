<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    public function index(Request $request)
    {
        $booking = Booking::with(['user', 'room',])->get();
        return view('booking', ['booking' => $booking]);
    }

}
