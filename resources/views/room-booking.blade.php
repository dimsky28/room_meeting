@extends('layouts.mainlayout')

@section('title', 'Room Booking')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<main class="content px-4 py-5">
    <div class="container-fluid">
        <div class="card shadow-sm p-4 mb-5 rounded">
            <div class="card-body">
                <h4 class="fw-bold mb-4">Pemesanan</h4>

                @if (Session::has('message'))
                    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form action="room-booking" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="user" class="form-label">Pengguna</label>
                                <select name="user_id" id="user" class="form-control inputbox">
                                    <option value="">Nama Pengguna</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="room" class="form-label">Ruangan</label>
                                <select name="room_id" id="room" class="form-control inputbox">
                                    <option value="">Pilih Ruangan</option>
                                    @foreach ($rooms as $item)
                                        <option value="{{ $item->id }}">{{ $item->room_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="booking_time" class="form-label">Booking Time</label>
                                <input type="text" id="booking_time" name="booking_time" class="datetimepicker form-control">
                            </div>
                            <div class="mb-3">
                                <label for="return_time" class="form-label">Return Time</label>
                                <input type="text" id="return_time" name="return_time" class="datetimepicker form-control">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Pesan</button>
                        </div>
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
        $('.inputbox').select2();
    });
</script>
<script>
    $(document).ready(function(){
        $('.datetimepicker').datetimepicker({
            format: 'Y-m-d H:i:s'  // Format tanggal dan waktu
        });
    });
</script>
@endsection
