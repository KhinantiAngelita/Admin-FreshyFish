<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>FreshyFish</title>

    <!-- Bootstrap core CSS -->
    <link href="landing-page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="landing-page/assets/css/fontawesome.css">
    <link rel="stylesheet" href="landing-page/assets/css/style.css">
    <link rel="stylesheet" href="landing-page/assets/css/animated.css">
    <link rel="stylesheet" href="landing-page/assets/css/owl.css">
    <link rel="stylesheet" href="landing-page/assets/css/style2.css">
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <main>
        <!-- ***** Header Area Start ***** -->
        <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="index.html" class="logo">
                                <img src="landing-page/assets/images/logo.png" alt="">
                            </a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                                <li class="scroll-to-section"><a href="#about">Tentang Kami</a></li>
                                <li class="scroll-to-section"><a href="{{ route('articles.index') }}">Artikel</a></li>
                                <li class="scroll-to-section"><a href="{{ route('auth.login') }}">Admin</a></li>
                            </ul>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->

        <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 align-self-center">
                                <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>FreshyFish</h6>
                                            <h2>Cara Baru <br> Belanja Ikan</h2>
                                            <p>Kami hadir dengan mimpi memberikan kemudahan bagi mereka yang bergaya hidup padat, sibuk, digital-savvy, dan menghindari kerepotan dalam membeli ikan. Tidak hanya itu, FreshyFish dapat membantu para penjual ikan dalam melariskan dagangannya denggan menghadirkan sarana penjualan digital.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <img src="landing-page/assets/images/memancing-home.png" alt="memancing keributan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="about" class="about section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <img src="landing-page/assets/images/banner-img2.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="about-right-content">
                                    <div class="section-heading">
                                        <h4>Tentang Kami</h4>
                                        <div class="line-dec"></div>
                                    </div>
                                    <p> Kami memiliki tujuan untuk mempermudah distribusi ikan segar dari supplier langsung ke konsumen di Kota Bogor. Dalam sistem tradisional, konsumen sering mengalami kesulitan mendapatkan ikan segar karena keterbatasan akses dan minimnya informasi mengenai ketersediaan produk. Di sisi lain, supplier menghadapi tantangan dalam menjual ikan secara efektif. Aplikasi ini dirancang untuk mengatasi permasalahan tersebut dengan menyediakan platform yang menghubungkan supplier dan konsumen secara langsung.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="class">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage text_align_center">
                            <h2>Mengapa Memilih Kami</h2>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 margi_bottom">
                        <div class="class_box">
                            <img src="landing-page/assets/images/mancing.png" alt="#" />
                            <h3>Ikan Segar Langsung dari Sumbernya</h3>
                            <p>Menjamin kesegaran produk dengan distribusi langsung dari supplier.</p>
                        </div>
                    </div>
                    <div class="col-md-4 margi_bottom">
                        <div class="class_box blue">
                            <img src="landing-page/assets/images/mancing2.png" alt="#" />
                            <h3>Kemudahan Berbelanja <br> <br> </h3>
                            <p>Fitur kategori memudahkan konsumen memilih produk sesuai kebutuhan.</p>
                        </div>
                    </div>
                    <div class="col-md-4 margi_bottom">
                        <div class="class_box">
                            <img src="landing-page/assets/images/mancing3.png" alt="#" />
                            <h3>Solusi untuk Konsumen dan Supplier</h3>
                            <p>Mengatasi tantangan akses konsumen dan pemasaran supplier.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="services" class="services section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h4>Jelajahi Artikel Terbaru</h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.5s">
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-4">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="landing-page/assets/images/ikan-pepes.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">Ikan Air Laut</a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Pepes ikan, sajian nikmat temani sahur</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="landing-page/assets/images/ikan-kuning.jpeg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">Ikan Air Payau</a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Resep ikan kuah kuning asal papua yang sedap</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="landing-page/assets/images/ikan-segar.jpeg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">Ikan Air Tawar</a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Tips membersihkan ikan dengan mudah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- nyoba yak
        <div class="container-fluid m-0 p-0">
            <div>
                <div class="row m-3" id="newsType"></div>
                <div class="row me-2 ms-2" id="newsdetails"></div>
            </div>
        </div>
        -->
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p> © 2024 Aetheria All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="landing-page/vendor/jquery/jquery.min.js"></script>
    <script src="landing-page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="landing-page/assets/js/owl-carousel.js"></script>
    <script src="landing-page/assets/js/animation.js"></script>
    <script src="landing-page/assets/js/imagesloaded.js"></script>
    <script src="landing-page/assets/js/custom.js"></script>


</body>

</html>