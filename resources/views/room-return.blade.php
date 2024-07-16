@extends('layouts.mainlayout')

@section('title', 'Room Return')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<main class="content px-4 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm p-4 mb-5 rounded">
                    <div class="card-body">
                        <h4 class="fw-bold mb-4">Pengembalian Ruangan</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <form action="room-return" method="post" enctype="multipart/form-data">
                            @csrf
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
                            <div class="mb-3">
                                <label for="actual_return_time" class="form-label">Actual Return Time</label>
                                <input type="text" id="actual_return_time" name="actual_return_time" class="datetimepicker form-control">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Kembalikan</button>
                        </form>
                    </div>
                </div>
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

    $(document).ready(function(){
        $('.datetimepicker').datetimepicker({
            format: 'Y-m-d H:i:s'  // Format tanggal dan waktu
        });
    });
</script>
@endsection
