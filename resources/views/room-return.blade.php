@extends('layouts.mainlayout')

@section('title', 'Room Return')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
        <h1 class="mb-5">Form Kembalikan</h1>

        <div class="mt-5">
            @if (session('message'))
                <div class="alert {{session('alert-class')}}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form action="room-return" method="post">
            @csrf
            <div class="mb-3">
                <label for="user" class="form-label">Pengguna</label>
                <select name="user_id" id="user" class="form-control inputbox">
                    <option value="">Pilih Pengguna</option>
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
                        <option value="{{ $item->id }}">{{$item->room_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="actual_return_time">Actual Return Time</label>
                <input type="text" id="actual_return_time" name="actual_return_time" class="datetimepicker form-control">
            </div>
                @if(Auth::user()->is_admin)
                    <form action="{{ url('admin-room-return') }}" method="post" style="display:inline;">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $item->user->id }}">
                        <input type="hidden" name="room_id" value="{{ $item->room->id }}">
                        <button type="submit" class="btn btn-danger btn-sm">Kembalikan</button>
                    </form>
                @endif
            <div>
                <button type="submit" class="btn btn-primary w-100">Kembalikan</button>
            </div>
        </form>
    </div>

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
