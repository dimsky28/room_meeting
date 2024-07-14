@extends('layouts.mainlayout')

@section('title', 'Room List')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">

<main class="content px-2 py-3">
    <div class="container-fluid">
        <form action="" method="get" class="mb-3 col-4">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <input type="text" name="title" class="form-control" placeholder="Cari Ruangan">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($rooms as $room)
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img src="{{ $room->cover ? asset('storage/cover/'.$room->cover) : asset('assets/img/notfile.png') }}" class="card-img-top img-fluid" alt="Room Image" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                        <h5 class="card-title">{{ $room->room_name }}</h5>
                        <p>Status: {{ $room->status }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $room->id }}">Lihat Detail</button>                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $room->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $room->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{ $room->id }}">{{ $room->room_name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ $room->description }}</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Kapasitas: {{ $room->capacity }}</li>
                                        <li class="list-group-item">Alamat: {{ $room->address }}</li>
                                        <li class="list-group-item {{ $room->status == 'ready' ? 'text-success' : 'text-danger' }}">Status: {{ $room->status }}</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

<!-- Optional: Add some custom styles -->
<style>
    .btn-room {
        background-color: transparent;
        border: none;
        text-decoration: underline;
        cursor: pointer;
    }
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
</style>

<!-- Make sure to include Bootstrap's JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxw1KM+5ZGKV1oBxPr1op5kpYxs//E0fDl5s2aXgW" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxn0w" crossorigin="anonymous"></script>

@endsection
