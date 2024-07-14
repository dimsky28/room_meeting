@extends('layouts.mainlayout')

@section('title', 'Banned Users')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">


<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h4>Pengguna yang Dilarang</h4>
                </div>
                <div>
                    <a href="/users" class="btn btn-secondary btn-sm me-3 rounded-pill">Kembali</a>
                </div>

                @if (session('status'))
                    <div class="alert alert-success mt-4">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card border-0 mt-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
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
                                @foreach ($bannedUsers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->phone ?? '-' }}</td>
                                        <td>{{ $item->biro }}</td>
                                        <td>{{ $item->agenda }}</td>
                                        <td>
                                            <a href="/user-restore/{{$item->slug}}" class="btn btn-outline-dark btn-sm me-1"><i class="fas fa-undo"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
