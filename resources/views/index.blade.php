<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karang Taruna Jatipulo</title>
    {{-- logo --}}
    <link rel="icon" href="img/logokatarjp.png" type="image/x-icon">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{asset('css/style.index.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- fonts links -->
</head>
<body>
    <div class="all-content">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" id="logo"><img src="img/logonavbar2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fa-solid fa-bars" style="color: white; font-size: 23px;"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tentang">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#galeri">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#news">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" style="margin-right: 40px">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- navbar -->

        <!-- home section -->
        <section id="home">
            <div class="content ">
                <h3>Tempat Berkumpul<br>Yang Ideal</h3>
                <p>Ruangan peminjaman yang ideal untuk setiap kesempatan
                    <br>Segera pesan ruangan Anda sekarang dan jadikan acara Anda menjadi tak terlupakan.
                </p>
                <button id="btn">
                    <a href="/login" style="text-decoration: none;" class="button-link">Login</a>
                </button>

            </div>
        </section>
        <!-- home section -->

        <!-- about section -->
        <div class="about" style="margin-top : 30px;" id="tentang">
            <div class="container">
                <div class="heading">Tentang <span>Kita</span></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <img src="/img/tentangkita.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Menjadi Pionir Digital Di Jatipulo?</h3>
                        <p>Karena kami adalah satu-satunya karang taruna yang memiliki website peminjaman gedung serbaguna di Kelurahan Jatipulo ini!
                            <br><br>Bagian yang terbaik dari ialah kami bangga menjadi pionir dalam memanfaatkan teknologi untuk menjangkau masyarakat lebih luas. Jelajahi program kami secara online dan bergabunglah dengan komunitas yang dinamis dan inovatif.
                            <br><br>Karang Taruna Jatipulo tidak hanya berinovasi tetapi juga mendekatkan diri dengan masyarakat. Sebagai satu-satunya Karang Taruna dengan kehadiran online, kami mempermudah akses informasi dan partisipasi dalam setiap kegiatan kami.
                            <br><br>"TUNGGU GEBRAKAN KAMI SELANJUTNYA!!!"
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- about section -->

        <!-- top cards -->
        <section class="top-cards" style="margin-top: 30px">
            <div class="heading2">Top Unit <span>2024</span></div>
            <div class="heading2">Karang Taruna Unit 04</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card">
                            <div class="image-container">
                                <img src="img/unit04 (12).jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card">
                            <div class="image-container">
                                <img src="img/unit04 (7).jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card">
                            <div class="image-container">
                                <img src="img/unit04 (4).jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 5px solid #FCEF03; margin: 20px 0;">
            </div>
        </section>
        <!-- top cards -->
        <!-- our gallery -->
        <div class="container" id="galeri">
            <h1>Galeri <span>Kami</span></h1>
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <img src="img/unit04 (4).jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <img src="img/unit04 (4).jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <img src="img/unit04 (4).jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <img src="img/unit04 (4).jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <img src="img/unit04 (4).jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <img src="img/unit04 (4).jpg" alt="">
                    </div>
                </div>
            </div>
            <hr style="border-top: 5px solid #FCEF03; margin: 20px 0;">
        </div>
        <!-- our gallery -->

        <!-- blogs -->
        <section class="news" style="margin-top: 30px;" id="news">
            <h1>Berita <span>Kami</span></h1>
            <div class="container">
                @if (isset($news) && count($news) > 0)
                <div class="row">
                    @foreach ($news as $item)
                    <div class="col-md-4 py-3 py-md-0 berita-item">
                        <div class="card">
                            @if ($item->image)
                                <img src="{{ Storage::url($item->image) }}" alt="Gambar Berita" class="card-img-top berita-image">
                            @endif
                            <div class="card-body">
                                <h3>{{ $item->title }}</h3>
                                <h5>{{ date('d-m-Y', strtotime($item->release_date)) }}</h5>
                                <p>{{ Str::limit($item->content, 100) }}</p>
                                <button type="button" id="blogbtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newsModal{{ $item->id }}">
                                    Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="newsModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="newsModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fw-bold" id="newsModalLabel{{ $item->id }}">{{ $item->title }}</h4>
                                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if ($item->image)
                                        <img src="{{ Storage::url($item->image) }}" alt="Gambar Berita" class="img-fluid">
                                    @endif
                                    <p class="fs-5" style="margin-top: 15px">{{ $item->content }}</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <p class="fs-6">Rilis pada tanggal {{ date('d-m-Y', strtotime($item->release_date)) }}</p>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                    {{-- <p class="text text-center fw-bold">BELUM ADA BERITA YANG TERSEDIA SAAT INI.</p> --}}
                @endif
            </div>
        </section>
        <!-- blogs -->


        <!-- contact -->
        <section class="contact" id="contact">
            <div class="container">
            <div class="row">
                <div class="col-md-7 text-center">
                <div class="heading6">Hubungi <span>Kami</span></div>

                <p>Hubungi kami untuk konfirmasi mengenai pemesanan Gedung Serbaguna
                <br>dan informasi seputar website.
                </p>
                <img src="/img/profilaldi.jpeg" class="profile-image">
                    <h4>Sidiq Aldi Firmansyah</h4>
                    <p>Admin Website & Developer</p>
                    <p>
                        <a href="" class="social"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/shenandoah_33/" class="social"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://wa.me/62895615776979?text=Halo%20Sidiq%20Aldi%20Firmansyah,%20saya%20tertarik%20untuk%20berdiskusi%20lebih%20lanjut." class="social" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>

                    </p>
                </div>
                <div class="col-md-5" id="col">
                    <h1>Info</h1>
                    <p style="margin-bottom: 5px;"><i class="fa-regular fa-envelope"></i> sanulsyaban25@gmail.com</p>
                    <p style="margin-bottom: 5px;"><i class="fa-solid fa-phone"></i> +6285819543158 (Wakil Ketua Karang Taruna Jatipulo)</p>
                    <p style="margin-bottom: 5px;"><i class="fa-brands fa-instagram"></i> @kt.jatipulo </p>
                    <p style="margin-bottom: 5px;"><i class="fa-solid fa-building-columns"></i> Sekretariat Karang Taruna Jatipulo Jalan Tunjung III Rt 004/03 Jatipulo, Palmerah Jakarta Barat</p>
                </div>
            </div>
            </div>

        </section>
        <!-- contact -->

        <!-- footer -->
        <footer id="footer">
            <div class="footer-logo text-center">
                <img src="/img/logofooter.png" alt="">
            </div>
            <div class="socail-links text-center">
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-pinterest-p"></i>
            </div>
            <div class="credite text-center">
                <a href="https://www.instagram.com/shenandoah_33/">Designed By Shenandoah_33</a>
            </div>
            <div class="copyright text-center">
                &copy; Copyright <strong><span>Sidiq Aldi Firmansyah.</span></strong>
            </div>
        </footer>
        <!-- footer -->

        <a href="#" class="arrow"><i><img src="/img/logokatarjp.png" alt="" width="50px"></i></a>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
