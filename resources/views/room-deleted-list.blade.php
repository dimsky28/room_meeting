@extends('layouts.mainlayout')

@section('title', 'Deleted Room')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">

<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h4>Ruangan Yang Dihapus</h4>
                </div>
                <div>
                    <a href="/rooms" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                                        <th scope="col">Nama Ruangan</th>
                                        <th scope="col">Kapasitas</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deletedRooms as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->room_name }}</td>
                                            <td>{{ $item->capacity }}</td>
                                            <td>
                                                @foreach ($item->categories as $category)
                                                    {{ $category->name }}
                                                @endforeach
                                            </td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="/room-restore/{{$item->slug}}" class="btn btn-secondary">Pulihkan</a>
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
