<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/style.css">
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/blog.css">

    <title>SISA - SISTEM INFROMASI SAMPAH</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('template') }}/front/img/favicon.ico" />

</head>

<body>
    <!-- navbar -->
    <section id="nav-bar">
        <nav class="navbar scrolled navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="{{ asset('template') }}/front/img/earntrash.png">Earntrash</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#slider">Beranda</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#testimonials">Testimoni</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </section>
    <!-- akhir navbar -->

    <!-- slider -->
    <div id="slider">
        <div id="headerSlider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
                <li data-target="#headerSlider" data-slide-to="1"></li>
                <li data-target="#headerSlider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
                    <img src="{{ asset('template') }}/front/img/slide-1-01.png" class="d-block img-fluid">
                    <div class="carousel-caption text-left">
                        {{-- <h5>Sudah Kita <span>Tabung mi</span></h5>
                        <h5>sampah ta <span>hari ini?</span></h5>
                        <br> --}}
                        {{-- <a href="https://play.google.com/store/apps/details?id=com.sisa.customer" >
                            <img src="{{ asset('template') }}/front/img/earntrash.png" alt="workingspace1" class="img-fluid photo">
                        </a> --}}
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('template') }}/front/img/jumbotron-bg1-01.jpg" class="d-block img-fluid">
                    <div class="carousel-caption">
                        <!-- <h5 class="text-left">How To Make A Website</h5> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('template') }}/front/img/jumbotron-bg2-01.jpg" class="d-block img-fluid">
                    <div class="carousel-caption">
                        <!-- <h5 class="text-right">How To Make A Website</h5> -->
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- akhir slider -->

    <!-- tentang -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Tentang</h2>
                    <div class="about-content">
                        Earntrash adalah Sistem Informasi Sampah atau Bank Sampah, tujuan kami adalah membantu nasabah earntrash terdaftar untuk mengelola sampah menjadi lebih mudah. Kami, sebagai organisasi yang peduli terhadap kelestarian lingkungan, membuat aplikasi ini untuk menciptakan
                        bentuk sistem daur ulang yang efisien sehingga mudah diakses dimana saja dan kapan saja, Harapan kami adalah untuk menghubungkan orang - orang dalam membentuk fondasi yang kokoh bagi lingkungan serta berusaha untuk menjadikan dunia
                        ini tempat yang lebih baik. Kami dengan senang hati menyambut semua orang yang ingin berpartisipasi dalam gerakan ini.
                    </div>
                    <a href="#" <button type="button" class="btn btn-primary">
                        Lihat Lebih Lengkap>>
                    </a></button>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('template') }}/front/img/earntrash.png" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- akhir tentang -->

    <!-- layanan -->
    <section id="services">
        <div class="container">
            <h1>Layanan Kami</h1>
            <div class="row services">
                <div class="col-md-3 text-center">
                    <div class="icon">
                        <i class="fa fa-trash"></i>
                    </div>
                    <h3>Kumpulkan Sampahmu</h3>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p> -->
                </div>
                <div class="col-md-3 text-center">
                    <div class="icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <h3>Penjemputan Langsung</h3>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p> -->
                </div>
                <div class="col-md-3 text-center">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h3>Sesuai Lokasi</h3>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p> -->
                </div>
                <div class="col-md-3 text-center">
                    <div class="icon">
                        <i class="fa fa-mobile"></i>
                    </div>
                    <h3>Akses Melalui Mobile dan Dekstop</h3>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p> -->
                </div>
            </div>
        </div>
    </section>
    <!-- akhir layanan -->

    <!-- testimoni -->
    <section id="testimonials">
        <div class="container">
            <h1>Testimoni</h1>
            <!-- <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p> -->
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <img src="{{ asset('template') }}/front/img/img4-01.png" class="user">
                        <blockquote>"Aplikasi yang sangat bermanfaat baik untuk kita sendiri serta lingkungan."</blockquote>
                        <h3>Shavira Pratiwi <span>User earntrash</span></span>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <img src="{{ asset('template') }}/front/img/img4-01.png" class="user">
                        <blockquote>"Sangat berguna barang" tak terpakai seperti dos ataupun kertas bisa di jadikan uang"</blockquote>
                        <h3>Kumbohu 07 <span>User earntrash</span></span>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <img src="{{ asset('template') }}/front/img/img4-01.png" class="user">
                        <blockquote>"Salah satu aplikasi yang consern terhadap lingkungan......keren"</blockquote>
                        <h3>Andiidsan Ilyas <span>User earntrash</span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir testimoni -->

    <!-- Kontak -->
    <section id="contact">
        <div class="container">
            <h1>Kontak Kami</h1>
            <div class="row">
                <div class="col-md-6">
                    <form class="contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama Anda">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Nomor Telephone">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Anda">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Masukkan Pesan Anda"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                </div>
                <div class="col-md-6 contact-info">
                    <div class="follow"><b>Alamat:</b> <i class="fa fa-map-marker"></i>Jl.Ketintang Baru Gang VIII No 33A, Gayungan, Surabaya, Jawa Timur</div>
                    <div class="follow"><b>No. Telepon:</b> <i class="fa fa-phone"></i>083831389599</div>
                    <div class="follow"><b>Email:</b> <i class="fa fa-envelope-o"></i> earntrash@support.con</div>
                    <div class="follow"><label>
                        <b>Sosial Media:</b>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                    </label></div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- akhir kontak -->

    <!-- footer -->
    <section id="footer">
        <div class="container text-center">
            <p>Made With <i class="fa fa-heart-o"></i> by Schiene Tren</p>
        </div>
    </section>
    <!-- akhir footer -->
    <script src="{{ asset('template') }}/front/js/smooth-scroll.js"></script>
    <script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    <script>
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            var list = document.getElementsByClassName("nav-link")
            for (var i=0; i<list.length; i++){
                if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
                    document.getElementById("nav-bar").style.backgroundColor = "#ffc299";
                    document.getElementById("nav-bar").style.boxShadow = "0px 0px 15px 5px rgba(0, 0, 0, 0.2)";
                    list[i].style.fontSize = "16px";


                } else {
                    document.getElementById("nav-bar").style.backgroundColor = "transparent";
                    document.getElementById("nav-bar").style.boxShadow = "0px 13px 15px 5px rgba(0, 0, 0, 0)";
                    list[i].style.fontSize = "17px";
                }
            }
        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
