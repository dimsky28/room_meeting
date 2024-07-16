@extends('layouts.mainlayout')

@section('title', 'Edit Category')

@section('content')



<main class="content px-4 py-5">
    <div class="container-fluid">
        <div class="card shadow-sm p-4 mb-5 rounded">
            <div class="card-body">
                <h4 class="fw-bold mb-4">Edit Category</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/category-edit/{{$category->slug}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}" placeholder="Nama Katgori">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success me-3" type="submit">Edit</button>
                        <a href="/categories" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>

@endsection

