@extends('layouts.mainlayout')

@section('title', 'Add Category')

@section('content')

<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3">
            <h2 class="text-center text-primary">Tambah Kategori</h2>
            <div class="mt-5 w-50 mx-auto">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="category-add" method="post" class="bg-light p-4 rounded shadow-sm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori">
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-success me-3" type="submit"><i class="bi bi-save me-2"></i>Simpan</button>
                        <a href="/categories" class="btn btn-danger"><i class="bi bi-x-circle me-2"></i>Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
