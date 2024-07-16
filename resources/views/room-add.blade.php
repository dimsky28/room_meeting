@extends('layouts.mainlayout')

@section('title', ' Add Room')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<main class="content px-4 py-5">
    <div class="container-fluid">
        <div class="card shadow-sm p-4 mb-5 rounded">
            <div class="card-body">
                <h4 class="fw-bold mb-4">Tambah Ruangan</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="room-add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" id="image" class="form-control" name="image" accept="image/*" onchange="previewImage(event)">
                            </div>
                            <div class="mb-3">
                                <img id="imagePreview" src="" style="display: none; max-width: 100%; margin-top: 10px">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="capacity" class="form-label">Kapasitas</label>
                                <input type="text" name="capacity" id="capacity" class="form-control" placeholder="Kapasitas" value="{{ old('capacity')}}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="alamat" value="{{ old('address')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="room_name" class="form-label">Nama Ruangan</label>
                                <input type="text" name="room_name" id="room_name" class="form-control" placeholder="Nama Ruangan" value="{{ old('room_name')}}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea type="text" name="description" id="description" class="form-control" placeholder="Deskripsi" rows="8" style="resize: vertical;" value="{{ old('description')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button class="btn btn-success me-3" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/rooms" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
