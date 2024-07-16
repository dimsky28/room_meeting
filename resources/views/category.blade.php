@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">

<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h4>List Kategori</h4>
                </div>
                <div>
                    <a href="category-deleted" class="btn btn-secondary btn-sm rounded-pill"><i class="bi bi-trash-fill me-2"></i> Kategori Yang Dihapus</a>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card border-0 mt-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Kategori</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        <a href="category-edit/{{$item->slug}}" class="btn btn-outline-dark btn-sm me-1"><i class="bi bi-pencil"></i></a>
                                                        <a href="category-delete/{{$item->slug}}" class="btn btn-outline-dark btn-sm"><i class="bi bi-x-circle"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 mt-4">
                            <div class="card-body">
                                <h5 class="card-title">Tambah Kategori</h5>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="category-add" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Kategori</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan</button>
                                        <a href="/categories" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                                    </div>
                                    @if (session('status'))
                                        <div class="alert alert-success mt-4">{{ session('status') }}</div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


@endsection
