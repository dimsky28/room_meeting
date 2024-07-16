<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/style.index.css')}}" />
    <!-- Fonts google poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <title>Home</title>
    <link rel="icon" href="img/logokatarjp.png" type="image/x-icon">
  </head>
  <body>
    <header class="beranda" id="beranda">
      <!-- NAVIGATION BAR-->
      <section class="navigation fixed-top" id="home">
        <div class="container">
          <div class="box-navigation animate__animated animate__bounce animate__fadeInDown">
            <div class="animate__animated animate__lightSpeedInRight animate__zoomIn">
              <img src="img/logo-kpu.png" width="65px">
            </div>
            <div class="box menu-navigation text-center">
              <ul>
                <li class="btn btn-danger">
                  <i class="ri-login-box-fill"></i>
                  <a href="/login">Login</a>
                </li>
                <li class="btn">
                  <i class="ri-home-8-fill"></i>
                  <a href="#beranda">Home</a>
                </li>
                <li class="btn">
                  <i class="ri-information-fill"></i>
                  <a href="#about">About</a>
                </li>
                <li class="btn">
                  <i class="ri-bookmark-fill"></i>
                  <a href="#famous">Famous</a>
                </li>
                <li class="btn">
                  <i class="ri-gallery-fill"></i>
                  <a href="#gallery">Gallery</a>
                </li>
              </ul>
            </div>
            <div class="box menu-bar">
              <i class="ri-menu-fill" style="color: rgb(255, 255, 255)"></i>
            </div>
          </div>
        </div>
      </section>
      <!-- NAVIGATION BAR-->

      <!-- Hero -->
      <section class="hero" id="hero">
          <div class="animate__animated animate__jackInTheBox">
          <h1 >Karang Taruna Kelurahan Jatipulo</h1>
          </div>
      </section>
      <!-- Hero -->
    </header>

    <!-- about -->
    <section class="about" id="about">
      <div class="container">
        <div class="box-about">
          <div class="box" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="150">
            <h1>RUANG SIDANG UTAMA KPU RI</h1>
          </div>
          <div class="box" data-aos="fade-left" data-aos-duration="1800" data-aos-delay="200">
            <img src="/img/karangtarunajatipulo.png" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- about -->

    <!--Famous-->
    <section class="famous" id="famous">
      <div class="container">
        <div class="box">
          <div class="box-famous">
            <div class="box" data-aos="fade-up" data-aos-duration="1100" data-aos-delay="100">
              <img src="/img/RAPAT1.JPG" alt="" />
              <h1>RUANG RAPAT RAFLESIA</h1>
            </div>
            <div class="box" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
              <img src="/img/RAPAT3.JPG" alt="" />
              <h1>RUANG RAPAT LANTAI 1</h1>
            </div>
            <div class="box" data-aos="fade-up" data-aos-duration="1300" data-aos-delay="300">
              <img src="/img/RAPAT2.JPG" alt="" />
              <h1>RUANG RAPAT LANTAI 3</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Famous-->

    <!-- gallery -->
    <section class="gallery" id="gallery">
      <div class="container">
        <div class="box-gallery">
          <img src="/img/G1.JPG" alt="" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100" />
          <img src="/img/G2.JPG" alt="" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300" />
          <img src="/img/G3.JPG" alt="" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500" />
          <img src="/img/G4.JPG" alt="" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="700" />
          <img src="/img/G5.JPG" alt="" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="900" />
          <img src="/img/G6.jpg" alt="" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="1100" />
        </div>
      </div>
    </section>
    <!-- gallery -->

    <!-- contact
    <section class="contact" id="contact">
      <div class="container">
        <div class="box-contact">
          <h1>Contact</h1>
          <form action="">
            <table>
              <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" placeholder="Masukan Nama" autocomplete="off" /></td>
              </tr>
              <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" placeholder="Masukan Email" autocomplete="off" /></td>
              </tr>
              <tr>
                <td><label for="pesan">Pesan</label></td>
                <td><textarea name="pesan" id="pesan" placeholder="Masukan Pesan....." autocomplete="off"></textarea></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </section>
    contact -->

    <!-- footer -->
    <body>
    <footer>
      <p>&copy; KOMISI PEMILIHAN UMUM REPUBLIK INDONESIA</p>
    </footer>
    </body>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./js/script.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
