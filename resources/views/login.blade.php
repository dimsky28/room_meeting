
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.login.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <link rel="icon" href="img/logokatarjp.png" type="image/x-icon">
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">

                <!-------------      image     ------------->

                <img src="img/logokatarjp.png" alt="">
                <div class="fw-bold text-center" style="margin-top:115px; ">
                    <p class="text-dark">Karang Taruna Kelurahan Jatipulo</p>
                </div>

            </div>


            <div class="col-md-6 right">
                <div class="input-box">

                            @if (session('status'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                            @endif

                   <header>MASUK</header>
                   <form action="/login" method="post">
                    @csrf
                   <div class="input-field">
                        <input type="text" class="input" id="username" required="" autocomplete="off" name="username">
                        <label for="username">Username</label>
                    </div>
                   <div class="input-field">
                        <input type="password" class="input" id="pass" required="" autocomplete="off" name="password">
                        <label for="pass">Password</label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary form-control">Masuk</button>
                    </div>
                   <div class="signin">
                    <span> Belum Punya Akun? <a href="/register">Daftar</a></span>
                   </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
