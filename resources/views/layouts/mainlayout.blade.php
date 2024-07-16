<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Meeting | @yield('title') </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/style.dashboard.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
    @yield('additional-css')
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">

            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="/dashboard">Karang Taruna</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Ruang Dashboard
                    </li>
                    <li class="sidebar-item">
                        @if (Auth::user())
                            @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" class="sidebar-link" @if(request()->route()->uri == 'dashboard') class='active'@endif>
                                <i class="fa-solid fa-list pe-2"></i>Dashboard
                            </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false" @if(request()->route()->uri == 'users' ||
                            request()->route()->uri == 'registered-users' ||
                            request()->route()->uri == 'user-detail/{slug}' ||
                            request()->route()->uri == 'user-ban/{slug}' ||
                            request()->route()->uri == 'user-banned') class='active' @endif>
                            <i class="fa-solid fa-file-lines pe-2"></i>Pengguna
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/users" class="sidebar-link">Pengguna Yang Terdaftar</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/registered-users" class="sidebar-link">Daftar Pengguna Baru</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/user-banned" class="sidebar-link">Daftar Pengguna Diblokir</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"aria-expanded="false">
                            <i class="fa-solid fa-sliders pe-2" @if(request()->route()->uri == 'rooms' ||
                                request()->route()->uri == 'room-add' ||
                                request()->route()->uri == 'room-delete/{slug}' ||
                                request()->route()->uri == 'room-edit/{slug}' ||
                                request()->route()->uri == 'room-deleted') class='active' @endif></i>Ruangan
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/rooms" class="sidebar-link">Jenis-jenis Ruangan</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/categories" class="sidebar-link" @if(request()->route()->uri == 'categories' ||
                                    request()->route()->uri == 'category-add' ||
                                    request()->route()->uri == 'category-delete/{slug}' ||
                                    request()->route()->uri == 'category-edit/{slug}' ||
                                    request()->route()->uri == 'category-deleted') class='active' @endif>Kategori Ruangan</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/room-add" class="sidebar-link">Tambah Ruangan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="/room-list" class="sidebar-link" @if(request()->route()->uri == 'room-list') class='active' @endif>
                            <i class="fa-solid fa-list pe-2"></i>List Ruangan
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/booking" class="sidebar-link collapsed" aria-expanded="false" @if(request()->route()->uri == 'booking') class='active' @endif>
                            <i class="fa-regular fa-user pe-2"></i>Jadwal Pemesanan
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/logout" class="sidebar-link">
                            <i class="fa-solid fa-right-from-bracket pe-2"></i>
                            Keluar
                        </a>
                    </li>


                    <ul class="sidebar-nav">
                        @else
                        <li class="sidebar-item">
                            <a href="/profile" class="sidebar-link" @if(request()->route()->uri == 'profile') class='active' @endif>
                                <i class="fa-regular fa-user pe-2"></i>
                                Profil
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/room-list" class="sidebar-link" @if(request()->route()->uri == 'room-list') class='active' @endif>
                                <i class="fa-solid fa-door-open pe-2"></i>
                                Ruangan
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/room-booking" class="sidebar-link" @if(request()->route()->uri == 'room-booking') class='active' @endif>
                                <i class="fa-solid fa-list-check pe-2"></i>
                                Pesan
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/room-return" class="sidebar-link" @if(request()->route()->uri == 'room-return') class='active' @endif>
                                <i class="fa-solid fa-check pe-2"></i>
                                Kembalikan
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/logout" class="sidebar-link">
                                <i class="fa-solid fa-right-from-bracket pe-2"></i>
                                Keluar
                            </a>
                        </li>
                    </ul>
                        @endif

                        @else
                        <a href="/login">Login</a>
                        @endif
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

            {{-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Karang Taruna Kelurahan Jatipulo</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/shenandoah_33/" class="text-muted">By. Shenandoah_33</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div> --}}
        <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

</body>
</html>
