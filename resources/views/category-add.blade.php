@extends('layouts.mainlayout')

@section('title', ' Add Category')

@section('content')


    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h2>Tambah Kategori</h2>
                <div class="mt-5 w-50">

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
                        <div>
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori">
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-success me-3" type="submit">Simpan</button>
                            <a href="/categories" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
