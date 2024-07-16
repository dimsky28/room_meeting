<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Peminjaman | @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- jQuery DateTimePicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.dashboard.css') }}" />
    <!-- Favicon -->
    <link rel="icon" href="img/logokatarjp.png" type="image/x-icon">
    @stack('styles')
</head>

<body>
    <div class="wrapper">
        {{-- Sidebar Dashboard Admin & User --}}
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="/dashboard">Karang Taruna</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Ruang Dashboard</li>
                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                            <li class="sidebar-item">
                                <a href="/dashboard" class="sidebar-link @if(request()->route()->uri == 'dashboard') active @endif">
                                    <i class="bi bi-speedometer pe-2"></i>Dashboard
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                                    aria-expanded="false" @if(in_array(request()->route()->uri, ['users', 'registered-users', 'user-detail/{slug}', 'user-ban/{slug}', 'user-banned'])) active @endif>
                                    <i class="bi bi-people pe-2"></i>Pengguna
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
                                <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false">
                                    <i class="bi bi-building-add pe-2" @if(in_array(request()->route()->uri, ['rooms', 'room-add', 'room-delete/{slug}', 'room-edit/{slug}', 'room-deleted'])) active @endif></i>Ruangan
                                </a>
                                <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                    <li class="sidebar-item">
                                        <a href="/rooms" class="sidebar-link">Jenis-jenis Ruangan</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="/categories" class="sidebar-link @if(in_array(request()->route()->uri, ['categories', 'category-add', 'category-delete/{slug}', 'category-edit/{slug}', 'category-deleted'])) active @endif">Kategori Ruangan</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="/room-add" class="sidebar-link">Tambah Ruangan</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="/room-list" class="sidebar-link @if(request()->route()->uri == 'room-list') active @endif">
                                    <i class="bi bi-building pe-2"></i>List Ruangan
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/booking" class="sidebar-link @if(request()->route()->uri == 'booking') active @endif">
                                    <i class="bi bi-card-list pe-2"></i>Jadwal Pemesanan
                                </a>
                            </li>
                            <li class="sidebar-header">
                                Master Ruang Informasi
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse" aria-expanded="false">
                                    <i class="bi bi-newspaper pe-2"></i>Informasi dan Berita
                                </a>
                                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.news.index') }}" class="sidebar-link @if (request()->route()->getName() == 'admin.news.index') active @endif">
                                            Daftar Berita Admin
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('news.create') }}" class="sidebar-link @if (request()->route()->getName() == 'news.create') active @endif">
                                            Tambah Berita
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('news.index') }}" class="sidebar-link @if (request()->route()->getName() == 'news.index') active @endif">
                                            Daftar Berita
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="/laporanpdf" class="sidebar-link">
                                    <i class="fbi bi-file-earmark-pdf pe-2"></i>Laporan Pemesanan
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/logout" class="sidebar-link">
                                    <i class="bi bi-box-arrow-left pe-2"></i>Keluar
                                </a>
                            </li>
                        @else
                            <li class="sidebar-item">
                                <a href="/profile" class="sidebar-link @if(request()->route()->uri == 'profile') active @endif">
                                    <i class="bi bi-speedometer pe-2"></i>Dashboard
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/room-list" class="sidebar-link @if(request()->route()->uri == 'room-list') active @endif">
                                    <i class="bi bi-building pe-2"></i>Ruangan
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/room-booking" class="sidebar-link @if(request()->route()->uri == 'room-booking') active @endif">
                                    <i class="bi bi-calendar-plus pe-2"></i>Pesan
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/room-return" class="sidebar-link @if(request()->route()->uri == 'room-return') active @endif">
                                    <i class="bi bi-calendar-check pe-2"></i>Kembalikan
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/logout" class="sidebar-link">
                                    <i class="bi bi-box-arrow-left pe-2"></i>Keluar
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="sidebar-item">
                            <a href="/login" class="sidebar-link">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </aside>
        {{-- Sidebar Dashboard Admin & User End--}}

        {{-- Navbar Dashboard --}}
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="{{ Storage::url(Auth::user()->image) }}" alt="Profile Picture" class="avatar">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="/logout" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
        </div>
        {{-- Navbar Dashboard End --}}

        {{-- Theme Toggle Button --}}
        <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @stack('scripts')
</body>
</html>
