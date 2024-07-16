@extends('layouts.mainlayout')

@section('title', 'Admin Room Return')

@section('content')

<div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
    <h1 class="mb-5">Form Pengembalian Ruangan (Admin)</h1>

    <div class="mt-5">
        @if (session('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <form action="{{ url('admin-room-return') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="user" class="form-label">Pengguna</label>
            <select name="user_id" id="user" class="form-control inputbox">
                <option value="">Pilih Pengguna</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="room" class="form-label">Ruangan</label>
            <select name="room_id" id="room" class="form-control inputbox">
                <option value="">Pilih Ruangan</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary w-100">Kembalikan Ruangan</button>
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

@endsection
