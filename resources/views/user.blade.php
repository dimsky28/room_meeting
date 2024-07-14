@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">

<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h4>Daftar Pengguna</h4>
                </div>
                <div>
                    <a href="/registered-users" class="btn btn-primary btn-sm me-3 rounded-pill"><i class="bi bi-person-plus-fill me-2"></i> Daftar Pengguna Baru</a>
                    <a href="/user-banned" class="btn btn-danger btn-sm rounded-pill"><i class="bi bi-person-x-fill me-2"></i> Daftar Pengguna Dilarang</a>
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
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->phone ? $item->phone : '-' }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>
                                                <a href="/user-detail/{{$item->slug}}" class="btn btn-outline-dark btn-sm me-1"><h class="bi bi-info-circle"></h></a>
                                                <a href="/user-edit/{{$item->slug}}" class="btn btn-outline-dark btn-sm me-1"><i class="bi bi-pencil"></i></a>
                                                <a href="/user-ban/{{$item->slug}}" class="btn btn-outline-dark btn-sm"><i class="bi bi-x-circle"></i></a>
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

