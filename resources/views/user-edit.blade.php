@extends('layouts.mainlayout')

@section('title', 'Users Edit')

@section('content')

<main class="content px-4 py-5">
    <div class="container-fluid">
        <div class="card shadow-sm p-4 mb-5 rounded">
            <div class="card-body">
                <h4 class="fw-bold mb-4">Edit User</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ Auth::user()->role_id == 1 ? route('users.update', $user->slug) : route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="currentImage" class="form-label"></label>
                            @if ($user->image)
                            <img src="{{ asset('storage/'.$user->image) }}" alt="Profile Picture" style="margin-bottom: 10px" class="rounded-image">
                            <img id="imagePreview" style="display: none; max-width: 100%; margin-top: 10px" class="rounded-image">
                            @endif
                            <input type="file" name="image" accept="image/*" onchange="previewImage(event)" class="form-control">
                            <img id="imagePreview" style="display: none; max-width: 100%; margin-top: 10px" class="rounded-image">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">No. Telp</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $user->alamat }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori_pengguna" class="form-label">Kategori Pengguna</label>
                                <input type="text" name="kategori_pengguna" id="kategori_pengguna" class="form-control" value="{{ $user->kategori_pengguna }}">
                            </div>
                        </div>
                        @if (Auth::user()->role_id == 1)
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" id="status" name="status" class="form-control" value="{{ $user->status }}">
                            </div>
                        </div>
                        @else
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" id="status" class="form-control" readonly value="{{ $user->status }}">
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button class="btn btn-success me-3" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ Auth::user()->role_id == 1 ? '/users' : '/profile' }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection

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
