<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        $booking = Booking::with(['user', 'room',])->paginate(10);
        return view('laporanpdf', ['booking' => $booking]);
    }

    public function exportPdf(Request $request)
    {
        $selectedIds = $request->input('selected_bookings');

        if (empty($selectedIds)) {
            // Jika tidak ada pemesanan yang dipilih, ambil semua pemesanan
            $bookings = Booking::with('user', 'room')->get();
        } else {
            // Jika ada pemesanan yang dipilih, ambil hanya pemesanan yang dipilih
            $bookings = Booking::with('user', 'room')
                                ->whereIn('id', $selectedIds)
                                ->get();
        }

        $pdf = PDF::loadView('booking_report', ['bookings' => $bookings]);
        return $pdf->stream('booking_report.pdf');
    }



}
