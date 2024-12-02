<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kategori Artikel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #e0faff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header */
        /* Styling untuk Header dan Navbar */
        .header-area {
            position: sticky;
            top: 0;
            background-color: #0096c8; /* Sesuaikan dengan warna background navbar */
            padding: 10px 0; /* Mengurangi jarak vertikal navbar */
            z-index: 999; /* Pastikan navbar berada di atas */
            box-shadow: 0 5px 7px rgba(0, 0, 0, 0.2);
        }
        
        /* Menyusun Navbar secara fleksibel */
        .main-nav {
            display: flex;
            justify-content: space-between; /* Menyusun logo dan menu navbar dengan jarak */
            align-items: center; /* Menyusun elemen navbar secara vertikal */
            height: 60px; /* Sesuaikan tinggi navbar agar lebih tinggi */
            max-width: 1200px;
            margin: 0 auto; /* Agar navbar tetap di tengah */
        }

        /* Menyusun logo */
        .main-nav .logo img {
            height: 70px; /* Sesuaikan ukuran logo */
            width: auto;
            padding-top: 2px; /* Memberikan sedikit ruang di atas logo agar lebih ke atas */
        }

        /* Menyusun menu navbar */
        .main-nav .nav {
            display: flex;
            align-items: center; /* Menyusun menu secara vertikal di tengah */
            margin: 0;
        }

        .main-nav .nav li {
            list-style: none;
            margin: 0 17px; /* Memberikan jarak antara menu */
        }

        .main-nav .nav a {
            font-size: 16px; /* Ukuran font menu */
            color: #ffffff; /* Warna teks menu */
            text-decoration: none;
            text-transform: capitalize; /* Membuat teks menjadi kapital */
            padding: 10px;
            transition: all 0.3s ease; /* Efek transisi saat hover */
        }

        .main-nav .nav li a.active,
        .main-nav .nav li a:hover {
            color: #4ae2ff; 
        }

        /* Efek Hover */
        .main-nav .nav li a:hover {
            background-color: rgba(0, 0, 0, 0.2); /* Memberikan efek latar belakang transparan saat hover */
            border-radius: 5px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-nav .nav {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }
            .header-area .logo img {
                height: 60px;
            }
        }


        /* Carousel */
        .carousel {
            position: relative;
        }

        .carousel-item {
            height: 85vh; /* Tinggi slider */
            position: relative;
            transition: transform 0.6s ease-in-out; /* Smooth transition */
        }

        .carousel-item img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .carousel-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.55); /* Overlay */
            z-index: 1;
        }

        .carousel-caption {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 2;
            width: 80%;
        }

        /* Font Styling */
        .carousel-caption h2 {
            font-size: 48px; /* Ukuran untuk slide 1 */
            font-weight: bold;
            line-height: 1.2;
            font-family: 'Montserrat', sans-serif;
        }

        .carousel-caption p {
            font-size: 30px; /* Ukuran besar untuk slide 2 dan 3 */
            font-family: 'Playfair Display', serif;
            line-height: 1.5;
        }

        .slide-2 .carousel-caption,
        .slide-3 .carousel-caption {
            top: 55%; /* Posisi vertikal lebih ke tengah */
            transform: translate(-50%, -50%);
        }

        /* Indicators */
        .carousel-indicators [data-bs-target] {
            background-color: #0096c8;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        /* Navigation Arrows */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            border-radius: 50%;
            width: 50px; /* Lingkaran kecil */
            height: 50px;
            background-color: #0096c8;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-control-prev-icon::before,
        .carousel-control-next-icon::before {
            content: '';
            width: 16px;
            height: 16px;
            border-style: solid;
            border-width: 3px 3px 0 0;
            transform: rotate(45deg);
            display: inline-block;
            color: white;
        }

        .carousel-control-prev-icon::before {
            transform: rotate(-135deg); /* Tanda panah kiri */
        }

        .carousel-control-next-icon::before {
            transform: rotate(45deg); /* Tanda panah kanan */
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 8%;
        }

        footer {
            margin-top: 40px;
            padding: 20px;
            text-align: center;
            background-color: #0096c8;
            color: white;
            font-size: 14px;
            border-radius: 12px;
        }

        footer a {
            color: white;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- Logo -->
                    <a href="{{ route('welcome') }}" class="logo">
                        <img src="../../images/rororo.png" alt="Logo FreshyFish">
                    </a>
                    <!-- Menu -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="scroll-to-section"><a href="{{ route('articles.index') }}" class="active">Artikel</a></li>
                        <li class="scroll-to-section"><a href="{{ route('auth.login') }}">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

        <!-- ***** Header Area End ***** -->


    <!-- Carousel -->
    <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="../../images/welcome-bg.jpg" alt="Artikel Resep Ikan">
                <div class="carousel-caption">
                    <h2>Artikel Resep<br>Ikan FreshyFish</h2>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item slide-2">
                <img src="../../images/welcome-bg2.webp" alt="Resep Lezat">
                <div class="carousel-caption">
                    <p>Jelajahi berbagai resep lezat dari kategori</p>
                    <p>ikan air tawar, ikan air payau, hingga ikan laut.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item slide-3">
                <img src="../../images/welcome-bg3.webp" alt="Kategori Favorit">
                <div class="carousel-caption">
                    <p>Pilih kategori favorit Anda untuk</p>
                    <p>memulai dan temukan inspirasi masakan ikan segar terbaik!</p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Highlights -->
    <div class="highlights">
        <!-- Row 1 -->
            <div class="container-fluid">
                <div class="row text-center align-items-center">
                    <!-- Highlight 1 - Resep Lezat -->
                    <div class="col-md-6" style="background-color: #0096c8; color: white; padding: 40px 0;">
                        <img src="../../images/2.png" alt="Resep Lezat" style="width: 110px; height: auto; margin-bottom: 15px;">
                        <h4 class="fw-bold" style="font-family: 'Playfair Display', serif;">Resep Lezat</h4>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 1.7;">
                            Ratusan resep ikan yang dirancang untuk
                        </p>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 0.1;">
                            meningkatkan cita rasa masakan Anda. Beragam pilihan
                        </p>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 1.7;">
                            resep untuk memanjakan lidah Anda dan keluarga.
                        </p>
                    </div>
                    <!-- Highlight 2 - Gizi Terjamin -->
                    <div class="col-md-6" style="background-color: white; color: #0096c8; padding: 40px 0; box-shadow: inset 0 0 0 1000px white;">
                        <img src="../../images/3.png" alt="Gizi Terjamin" style="width: 110px; height: auto; margin-bottom: 15px;">
                        <h4 class="fw-bold" style="font-family: 'Playfair Display', serif;">Gizi Terjamin</h4>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 1.7;">
                            Semua resep dirancang untuk memberikan
                        </p>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 0.1;">
                            manfaat kesehatan dengan nutrisi yang seimbang.
                        </p>
                            <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 1.7;">
                            Cocok untuk segala kebutuhan sehari-hari.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row 2 -->
            <div class="container-fluid">
                <div class="row text-center align-items-center">
                    <!-- Highlight 3 - Bahan Segar -->
                    <div class="col-md-6" style="background-color: white; color: #0096c8; padding: 40px 0; box-shadow: inset 0 0 0 1000px white;">
                        <img src="../../images/4.png" alt="Bahan Segar" style="width: 110px; height: auto; margin-bottom: 15px;">
                        <h4 class="fw-bold" style="font-family: 'Playfair Display', serif;">Bahan Segar</h4>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 1.7;">
                            Gunakan ikan segar terbaik untuk membuat
                        </p>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 0.1;">
                            hidangan berkualitas tinggi yang sempurna
                        </p>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 1.7;">
                            untuk setiap kesempatan keluarga.
                        </p>
                    </div>
                    <!-- Highlight 4 - Menggugah Selera -->
                    <div class="col-md-6" style="background-color: #0096c8; color: white; padding: 40px 0;">
                        <img src="../../images/5.png" alt="Menggugah Selera" style="width: 110px; height: auto; margin-bottom: 15px;">
                        <h4 class="fw-bold" style="font-family: 'Playfair Display', serif;">Menggugah Selera</h4>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 1.7;">
                            Masakan kami dirancang tidak hanya sehat,
                        </p>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 0.1;">
                            tetapi juga menggugah selera dengan kombinasi
                        </p>
                        <p style="font-family: 'Playfair Display', serif; font-size: 16px; line-height: 1.7;">
                            rasa yang sempurna untuk keluarga Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Categories -->
    <div class="categories">
    <!-- Kategori Ikan Air Tawar -->
    <a href="{{ route('articles.byCategory', 'Ikan Air Tawar') }}" class="category-card" style="background-image: url('/images/ikan_air_tawar.jpg');">
        <div class="overlay">
            <h4>Ikan Air Tawar</h4>
        </div>
    </a>

    <!-- Kategori Ikan Payau -->
    <a href="{{ route('articles.byCategory', 'Ikan Air Payau') }}" class="category-card" style="background-image: url('/images/ikan_air_payau.jpg');">
        <div class="overlay">
            <h4>Ikan Air Payau</h4>
        </div>
    </a>

    <!-- Kategori Ikan Laut -->
    <a href="{{ route('articles.byCategory', 'Ikan Laut') }}" class="category-card" style="background-image: url('/images/ikan_laut.jpg');">
        <div class="overlay">
            <h4>Ikan Laut</h4>
        </div>
    </a>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 All Rights Reserved | FreshyFish</p>
</footer>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    .categories {
        display: flex;
        flex-direction: column;
        gap: 0;
        margin: 0;
        padding: 0;
        flex: 1;
    }

    .category-card {
        position: relative;
        width: 100%;
        height: 350px;
        background-size: cover;
        background-position: center;
        border-radius: 0;
        overflow: hidden;
        text-decoration: none;
    }

    .category-card .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .category-card h4 {
        color: white;
        font-family: 'Montserrat', sans-serif;
        font-size: 48px;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        letter-spacing: 2px;
        margin: 0;
    }

    .category-card:hover .overlay {
        background-color: rgba(0, 0, 0, 0.7);
    }

    footer {
        background-color: #0096c8;
        color: white;
        text-align: center;
        padding: 20px;
        width: 100%;
        left: 0;
        margin-top: auto;
        border-radius: 0;
    }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
