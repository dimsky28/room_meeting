@extends('layouts.mainlayout')

@section('title', 'Booking')

@section('content')

<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3">
            <h4>Data Pemesanan</h4>
            <a href="/admin-room-return" class="btn btn-primary"><i class="fas fa-check"></i> Kembalikan Ruangan</a>

            <x-booking-table :booking='$booking' />
        </div>
    </div>
</main>



@endsection
