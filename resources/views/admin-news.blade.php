<!-- resources/views/admin-news.blade.php -->

@extends('layouts.mainlayout')

@section('title', 'Admin News')

@section('content')
<div class="container px-4 py-5">
    <h4>Daftar Berita</h4>
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center align-middle">
            <thead class="table">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Rilis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $index => $newsItem)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if ($newsItem->image)
                            <img src="{{ Storage::url($newsItem->image) }}" alt="Gambar Berita" class="rounded" style="width: 100px; height: auto;">
                        @else
                            <img src="{{ asset('assets/img/no-image.png') }}" alt="No Image" class="rounded" style="width: 100px; height: auto;">
                        @endif
                    </td>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ Str::limit($newsItem->content, 100) }}</td>
                    <td>{{ date('d-m-Y', strtotime($newsItem->release_date)) }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', $newsItem->id) }}" class="btn btn-warning btn-sm mb-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Optional: Add some custom styles -->
<style>
    .berita-image {
        max-width: 100px;
        height: auto;
    }
</style>

<!-- Make sure to include FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
