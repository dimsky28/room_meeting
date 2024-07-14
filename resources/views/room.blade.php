@extends('layouts.mainlayout')

@section('title', 'Room')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">
<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h4>Ruangan</h4>
                </div>
                <div>
                    <a href="/room-add" class="btn btn-primary btn-sm me-3 rounded-pill"><i class="bi bi-person-plus-fill me-2"></i> Tambah Ruangan</a>
                    <a href="/room-deleted" class="btn btn-danger btn-sm rounded-pill"><i class="bi bi-person-x-fill me-2"></i> Ruangan Yang Di Hapus</a>
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
                                        <th>No.</th>
                                        <th>Gambar Ruangan</th>
                                        <th>Nama Ruangan</th>
                                        <th>Kapasitas</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($item->cover)
                                                <img src="{{ asset('storage/cover/' . $item->cover) }}" alt="{{ $item->room_name }}" style="width: 100px; height: auto;">
                                            @else
                                                Tidak ada gambar
                                            @endif
                                        </td>
                                        <td>{{ $item->room_name }}</td>
                                        <td>{{ $item->capacity }}</td>
                                        <td>
                                            @foreach ($item->categories as $category)
                                                {{ $category->name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="/room-edit/{{$item->slug}}" class="btn btn-outline-dark btn-sm me-1"><i class="bi bi-pencil"></i></a>
                                            <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-room_name="{{ $item->room_name }}" data-slug="{{ $item->slug }}"><i class="bi bi-x-circle"></i></button>
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel"><i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="py-4">
                    <i class="fas fa-trash-alt fa-3x text-danger mb-3"></i>
                    <h4 class="mb-4">Yakin ingin hapus <span class="fw-bold" id="deleteUserName"></span>?</h4>
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    <a href="#" class="btn btn-danger me-3" id="confirmDeleteButton"><i class="fas fa-trash-alt me-2"></i>Hapus</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
