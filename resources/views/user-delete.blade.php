@extends('layouts.mainlayout')

@section('title', 'Delete User')

@section('content')

<link rel="icon" href="img/logokatarjp.png" type="image/x-icon">



<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3 align-items-center justify-content-center text-center">
            <h2>Yakin ingin hapus {{$user->username}} ?</h2>
            <div class="mt-5">
                <a href="/user-destroy/{{$user->slug}}" class="btn btn-danger me-5">Hapus</a>
                <a href="/users" class="btn btn-info">Batal</a>
            </div>
        </div>
    </div>
</main>
@endsection

