@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')

<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Daftar Pengguna</h4>
                    <div class="mt-5 d-flex justify-content-end">
                        <a href="/registered-users" class="btn btn-primary me-3">Daftar Pengguna Baru</a>
                        <a href="/user-banned" class="btn btn-secondary">Daftar Pengguna Dilarang</a>
                    </div>
                    <div class="mt-5">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        @endif
                        </div>
                    </div>
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Pengguna yang terdaftar
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Berikut Data Pengguna yang Terdaftar
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>No. Telp</th>
                                        <th>Biro</th>
                                        <th>Agenda</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>
                                            @if ($item->phone)
                                                {{ $item->phone }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $item->biro }}</td>
                                        <td>{{ $item->agenda }}</td>
                                        <td>
                                            <a href="/user-detail/{{$item->slug}}" class="btn btn-success">Detail</a>
                                            <a href="/user-ban/{{$item->slug}}" class="btn btn-danger">Ban User</a>
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

