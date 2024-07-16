@extends('layouts.mainlayout')

@section('title', 'Registered Users')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">

<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h4>Daftar Pengguna Baru</h4>
                </div>
                <div>
                    <a href="/users" class="btn btn-secondary btn-sm me-3 rounded-pill">Kembali</a>
                </div>

                @if (session('status'))
                    <div class="alert alert-success mt-4">{{ session('status') }}</div>
                @endif

                <div class="card border-0 mt-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">No. Telp</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registeredUsers as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone ?? '-' }}</td>
                                        <td>
                                            <a href="/user-detail/{{$user->slug}}" class="btn btn-success btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
