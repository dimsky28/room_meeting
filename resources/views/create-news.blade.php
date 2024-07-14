@extends('layouts.mainlayout')

@section('title', 'Create News')

@section('content')

<main class="content px-4 py-5">
    <div class="container-fluid">
        <div class="card shadow-sm p-4 mb-5 rounded">
            <div class="card-body">
                <h4 class="fw-bold mb-4">Tambah Berita</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" id="title" class="form-control" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="release_date" class="form-label">Tanggal Rilis</label>
                                <input type="date" id="release_date" class="form-control" name="release_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="content" class="form-label">Konten</label>
                                <textarea id="content" class="form-control" name="content" rows="8" style="resize: vertical;" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button class="btn btn-success me-3" type="submit"><i class="fas fa-save"></i> Simpan</button>
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
