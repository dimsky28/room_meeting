@extends('layouts.mainlayout')

@section('title', 'Edit News')

@section('content')

<main class="content px-4 py-5">
    <div class="container-fluid">
        <div class="card shadow-sm p-4 mb-5 rounded">
            <div class="card-body">
                <h4 class="fw-bold mb-4">Edit Berita</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.news.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="currentImage" class="form-label">Gambar Sebelumnya</label>
                                @if ($newsItem->image)
                                    <img src="{{ Storage::url($newsItem->image) }}" alt="Gambar Sebelumnya" class="d-block mb-2" style="max-width: 100%;">
                                @endif
                                <input type="file" name="image" accept="image/*" onchange="previewImage(event)" class="form-control">
                                <img id="imagePreview" style="display: none; max-width: 100%; margin-top: 10px">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" name="title" value="{{ $newsItem->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="release_date" class="form-label">Tanggal Rilis</label>
                                <input type="date" class="form-control" id="release_date" name="release_date" value="{{ $newsItem->release_date }}">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Perbarui</button>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="content" class="form-label">Konten</label>
                                <textarea class="form-control" id="content" name="content" rows="10" style="resize: vertical;">{{ $newsItem->content }}</textarea>
                            </div>
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
