<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">

    <title> FreshyFish </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('landing-page2/css/bootstrap.css') }}" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('landing-page2/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href=" {{ asset('landing-page2/css/responsive.css') }}" rel="stylesheet" />

</head>

<body>

    <div class="hero_area">
        <div class="hero_bg_box">
            <div class="bg_img_box">
                <img src="landing-page2/images/banner.png" alt="">
            </div>
        </div>

        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">

                    <div class="header_logo">
                        <img src="landing-page2/images/logo.png" alt="logo">
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.login') }}"> <i class="fa fa-user" aria-hidden="true"></i> Admin</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <!-- slider section -->
        <section class="slider_section ">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="detail-box">
                            <h1>
                                Tentang Kami

                            </h1>
                            <p>
                                Kami hadir dengan mimpi memberikan kemudahan bagi mereka yang bergaya hidup padat, sibuk, digital-savvy, dan menghindari kerepotan dalam membeli ikan. Tidak hanya itu, FreshyFish dapat membantu para penjual ikan dalam melariskan dagangannya denggan menghadirkan sarana penjualan digital.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="landing-page2/images/slider-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- mission section -->
    <section class="mission_section layout_padding">
        <div class="mission_container">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Misi <span>Kami</span>
                    </h2><br>

                </div>
                <p>Kami memiliki tujuan untuk mempermudah distribusi ikan segar dari supplier langsung ke konsumen di Kota Bogor. Dalam sistem tradisional, konsumen sering mengalami kesulitan mendapatkan ikan segar karena keterbatasan akses dan minimnya informasi mengenai ketersediaan produk. Di sisi lain, supplier menghadapi tantangan dalam menjual ikan secara efektif. Aplikasi ini dirancang untuk mengatasi permasalahan tersebut dengan menyediakan platform yang menghubungkan supplier dan konsumen secara langsung.</p>

            </div>
        </div>
        </div>
    </section>




    <!-- service section -->

    <section class="service_section layout_padding">
        <div class="service_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        Mengapa Memilih <span>FreshyFish</span>
                    </h2><br>

                </div>
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="box ">
                            <div class="detail-box">
                                <h5>
                                    Belanja Praktis <br> dan Efisien
                                </h5>
                                <p>
                                    Pengguna dapat menambahkan, mengurangi, atau menghapus produk sesuai kebutuhan, memberikan fleksibilitas penuh dalam proses belanja
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="box ">
                            <div class="detail-box">
                                <h5>
                                    Keranjang Belanja Praktis
                                </h5>
                                <p>
                                    Memudahkan pelanggan untuk menambahkan, mengelola, dan memantau produk sebelum pembayaran. Dengan fitur ini, belanja jadi lebih terorganisir dan efisien.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="box ">
                            <div class="detail-box">
                                <h5>
                                    Pengalaman Belanja Modern
                                </h5>
                                <p>
                                    Antarmuka aplikasi yang responsif dan ramah pengguna memastikan proses belanja menjadi mudah, cepat, dan nyaman, sehingga meningkatkan kepuasan pelanggan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end service section -->

    <!-- footer section -->
    <section class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Aetheria</a>
            </p>
        </div>
    </section>
    <!-- footer section -->

</body>

</html>