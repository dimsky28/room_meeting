@extends('layouts.mainlayout')

@section('title', 'Booking')

@section('content')

<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3">
            <h2>Pemesanan</h2>
            <div class="mt-5 d-flex justify-content-end">
                <a href="/room-return" class="btn btn-primary me-3">Kembalikan</a>
            </div>
            <x-booking-table :booking='$booking' />
        </div>
    </div>
</main>



@endsection
