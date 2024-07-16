@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')
<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Halaman Pengguna</h4>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-6">
                                        <div class="p-3 m-1">
                                            <h4>Selamat Datang, {{ Auth::user()->username }}</h4>
                                            <p class="mb-0">Semoga harimu selalu baik dan bersyukur.</p>
                                        </div>
                                    </div>
                                    <div class="col-6 align-self-end text-end">
                                        <img src="img/logokatarjp.png" class="img-fluid illustration-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card flex-fill border-0">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-12">
                                        <div class="p-3 m-1 text-center">
                                            <div class="card-text">
                                                <img src="{{ Storage::url(Auth::user()->image) }}" alt="Profile Picture" class="rounded-image">
                                            </div>
                                            <h4 class="card-text" style="margin-top: 20px"><strong>{{ Auth::user()->username }}</strong></h4>
                                            <p class="card-text"><i class="bi bi-telephone-fill me-2"></i>{{ Auth::user()->phone }}</p>
                                            <p class="card-text"><i class="bi bi-geo-alt-fill me-2"></i>{{ Auth::user()->alamat }}</p>
                                            <p class="card-text"><i class="bi bi-person-badge me-2"></i>{{ Auth::user()->kategori_pengguna }}</p>
                                            <div class="mt-3">
                                                <a href="{{ route('profile.edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Profil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($latestBooking)
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Pemesanan Terbaru Kamu</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Nama:</strong> {{ $latestBooking->user->username }}</p>
                                <p><strong>Ruangan:</strong> {{ $latestBooking->room->room_name }}</p>
                                <p><strong>Waktu Pesan:</strong> {{ $latestBooking->booking_time }}</p>
                                <p><strong>Waktu Kembali:</strong> {{ $latestBooking->return_time }}</p>
                                <p><strong>Status:</strong>
                                    @if ($latestBooking->actual_return_time)
                                        Selesai
                                    @else
                                        Sedang Berjalan
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="mb-3 mt-3">
                    <x-booking-table :booking='$booking' />
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
