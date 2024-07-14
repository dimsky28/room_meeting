<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $roomCount = Room::count();
        $categoryCount = Category::count();
        $newsCount = News::count();
        $userCount = User::count();
        $bookingCount = Booking::count();
        $booking = Booking::with(['user', 'room',])->get();

       // Logika untuk mendapatkan pemesanan terbaru yang belum selesai
       $latestBooking = Booking::with(['user', 'room'])
       ->whereNull('actual_return_time')
       ->orderByDesc('created_at')
       ->first();

    return view('dashboard', [
        'room_count' => $roomCount,
        'category_count' => $categoryCount,
        'user_count' => $userCount,
        'news_count' => $newsCount,
        'booking_count' => $bookingCount,
        'booking' => $booking,
        'latestBooking' => $latestBooking // Menambahkan latestBooking ke view
        ]);
    }

        public function dashboard()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('dashboard', ['users' => $users]);

    }
}
