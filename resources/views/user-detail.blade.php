@extends('layouts.mainlayout')

@section('title', 'Users Detail')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">


<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Detail Pengguna</h4>
                    <div class="mt-2 d-flex justify-content-end">
                        @if ($user->status == 'inactive')
                            <a href="/user-approve/{{$user->slug}}" class="btn btn-info me-3"><i class="fas fa-user-check"></i> Terima Pengguna</a>
                        @endif
                        <a href="/registered-users" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>

                @if (session('status'))
                <div class="mt-4">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                </div>
                @endif

                <div class="card shadow-sm p-4 mb-5 rounded">
                    <div class="row g-3">
                        <div class="col-md-12 mb-4">
                            @if ($user->image)
                                <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Picture" class="rounded-image">
                            @else
                                <img src="{{ asset('images/default_profile.png') }}" alt="Default Profile Image" class="img-thumbnail" style="width: 150px; height: 150px;">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" class="form-control" readonly value="{{$user->username}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">No. Telp</label>
                                <input type="text" id="phone" class="form-control" readonly value="{{$user->phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" readonly value="{{ $user->alamat }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori_pengguna" class="form-label">Kategori Pengguna</label>
                                <input type="text" id="kategori_pengguna" name="kategori_pengguna" class="form-control" readonly value="{{ $user->kategori_pengguna }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" id="status" class="form-control" readonly value="{{$user->status}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h4>Riwayat Booking</h4>
                    <x-booking-table :booking='$booking' />
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
