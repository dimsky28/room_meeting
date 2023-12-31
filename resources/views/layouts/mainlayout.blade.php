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
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="/dashboard">Roomeeting</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        @if (Auth::user())
                            @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class='active' @endif>
                                <i class="bi bi-speedometer2"></i>
                                <span>Dashboard</span>
                            </a>
                    </li>
                        <li class="sidebar-item">
                            <a href="/users" @if(request()->route()->uri == 'users' || 
                                request()->route()->uri == 'registered-users' || 
                                request()->route()->uri == 'user-detail/{slug}' || 
                                request()->route()->uri == 'user-ban/{slug}' || 
                                request()->route()->uri == 'user-banned') class='active' @endif>
                                <i class="bi bi-people"></i>
                                <span>Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                             <a href="/rooms" @if(request()->route()->uri == 'rooms' ||
                                request()->route()->uri == 'room-add' ||
                                request()->route()->uri == 'room-delete/{slug}' ||
                                request()->route()->uri == 'room-edit/{slug}' ||
                                request()->route()->uri == 'room-deleted') class='active' @endif>
                                <i class="bi bi-bookmarks"></i>
                                <span>Ruangan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                             <a href="/categories" @if(request()->route()->uri == 'categories' ||
                                request()->route()->uri == 'category-add' ||
                                request()->route()->uri == 'category-delete/{slug}' ||
                                request()->route()->uri == 'category-edit/{slug}' ||
                                request()->route()->uri == 'category-deleted') class='active' @endif>
                                <i class="bi bi-door-closed"></i>
                                <span>Kategori</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/room-list" @if(request()->route()->uri == 'room-list') class='active' @endif>
                                <i class="bi bi-card-list"></i>
                                <span>List Ruangan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/booking" @if(request()->route()->uri == 'booking') class='active' @endif>
                                <i class="bi bi-card-checklist"></i>
                                <span>Pemesanan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/logout">
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Keluar</span>
                            </a>
                        </li>

                        <ul class="sidebar-nav">
                            @else
                                <a href="/profile" @if(request()->route()->uri == 'profile') class='active' @endif>
                                    <i class="bi bi-people"></i>
                                    <span>Profil</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/room-list" @if(request()->route()->uri == 'room-list') class='active' @endif>
                                    <i class="bi bi-card-list"></i>
                                    <span>List Ruangan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/room-booking" @if(request()->route()->uri == 'room-booking') class='active' @endif>
                                    <i class="bi bi-card-checklist"></i>
                                    <span>Pesan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/room-return" @if(request()->route()->uri == 'room-return') class='active' @endif>
                                <i class="bi bi-arrow-return-right"></i>
                                <span>Kembalikan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/logout">
                                    <i class="bi bi-box-arrow-left"></i>
                                    <span>Keluar</span>
                                </a>
                            </li>
                        </ul>
                            @endif
                        @else
                        <a href="/login">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

                    @yield('content')



            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/dashboard.js"></script>
</body>

</html>


{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/style.dashboard.css')}}" />
    <!-- Fonts google poppins-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Meeting Room</title>
  </head>
  <link rel="icon" href="img/logo-kpu.png" type="image/x-icon">

<body>

  <div class="main d-flex flex-column justify-content-between">
    <div class="body-content h-100">
      <div class="row g-0 h-100">
              <div class="sidebar col-lg-2 collapse fw-bold d-lg-block" id="navbarTogglerDemo02">
                <div class="logo fw-bold text-center">
                  <img src="{{asset('img/logo-kpu.png')}}" alt="gambar" width="45px">
                  {{-- <i>Room<span class="danger">Meeting</span></i>
                </div>
                @if (Auth::user())
                      @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class='active' @endif>
                              <i class="bi bi-speedometer2"></i>
                              <span>Dashboard</span>
                            </a>
                            <a href="/users" @if(request()->route()->uri == 'users') class='active' @endif>
                              <i class="bi bi-people"></i>
                              <span>Pengguna</span>
                            </a>
                            <a href="/rooms" @if(request()->route()->uri == 'rooms' ||
                              request()->route()->uri == 'room-add' ||
                              request()->route()->uri == 'room-delete/{slug}' ||
                              request()->route()->uri == 'room-edit/{slug}' ||
                              request()->route()->uri == 'room-deleted') class='active' @endif>
                              <i class="bi bi-bookmarks"></i>
                              <span>Ruangan</span>
                            </a>
                            <a href="/categories" @if(request()->route()->uri == 'categories' ||
                              request()->route()->uri == 'category-add' ||
                              request()->route()->uri == 'category-delete/{slug}' ||
                              request()->route()->uri == 'category-edit/{slug}' ||
                              request()->route()->uri == 'category-deleted') class='active' @endif>
                              <i class="bi bi-door-closed"></i>
                              <span>Kategori</span>
                            </a>
                            <a href="/room-list" @if(request()->route()->uri == 'room-list') class='active' @endif>
                              <i class="bi bi-card-list"></i>
                              <span>List Ruangan</span>
                            </a>
                            <a href="/booking" @if(request()->route()->uri == 'booking') class='active' @endif>
                              <i class="bi bi-card-checklist"></i>
                              <span>Pemesanan</span>
                            </a>
                            <a href="/logout">
                              <i class="bi bi-box-arrow-left"></i>
                              <span>Keluar</span>
                            </a>
                        @else
                            <a href="/profile" @if(request()->route()->uri == 'profile') class='active' @endif>Profile</a>
                            <a href="/room-list" @if(request()->route()->uri == 'room-list') class='active' @endif>Daftar Ruangan</a>
                            <a href="/room-booking" @if(request()->route()->uri == 'room-booking') class='active' @endif>Pesan</a>
                            <a href="/room-return" @if(request()->route()->uri == 'room-return') class='active' @endif>
                              <i class="bi bi-arrow-return-right"></i>
                              <span>Kembalikan</span>
                            </a>
                            <a href="/logout">Keluar</a>
                        @endif
                      @else
                      <a href="/login">Login</a>
                  @endif
                </div>
                <div class="content p-3 col-lg-10">
                    @yield('content')
                </div>
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./dist/js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html> --}}
