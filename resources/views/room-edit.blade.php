@extends('layouts.mainlayout')

@section('title', 'Edit Room')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<main class="content px-4 py-5">
    <div class="container-fluid">
        <div class="card shadow-sm p-4 mb-5 rounded">
            <div class="card-body">
                <h4 class="fw-bold mb-4">Edit Ruangan</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/room-edit/{{$room->slug}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="currentImage" class="form-label">Gambar Sebelumnya</label>
                                @if ($room->cover!='')
                                <img src="{{ asset('storage/cover/'.$room->cover) }}" alt="Gambar Sebelumnya" class="d-block mb-2" style="max-width: 100%;">
                                @endif
                                <input type="file" name="image" accept="image/*" onchange="previewImage(event)" class="form-control">
                                <img id="imagePreview" style="display: none; max-width: 100%; margin-top: 10px">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <label for="currentCategory" class="form-label">Kategori Sebelumnya</label>
                                <ul>
                                    @foreach ($room->categories as $category)
                                        <li>{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="room_name" class="form-label">Nama Ruangan</label>
                                <input type="text" name="room_name" id="room_name" class="form-control" placeholder="Room Name" value="{{ $room->room_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="capacity" class="form-label">Kapasitas</label>
                                <input type="text" name="capacity" id="capacity" class="form-control" placeholder="Kapasitas" value="{{ $room->capacity }}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Alamat" value="{{ $room->address }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea type="text" name="description" id="description" class="form-control" placeholder="Deskripsi" value="{{ $room->description }}"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection


