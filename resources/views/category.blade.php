@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h2>List Kategori</h2>
                <div class="mt-5 d-flex justify-content-end">
                    <a href="category-add" class="btn btn-primary me-3">Tambah Kategori</a>
                    <a href="category-deleted" class="btn btn-secondary">Kategori Yang Di Hapus</a>
                </div>

                    <div class="mt-5">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Kategori Ruangan
                            </h5>
                        </div>
                        <div class="tabel-responsive" style="overflow-x: auto;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <a href="category-edit/{{$item->slug}}" class="btn btn-info">Edit</a>
                                                <a href="category-delete/{{$item->slug}}" class="btn btn-danger">Hapus</a>
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
@endsection
