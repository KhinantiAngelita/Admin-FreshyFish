<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kategori Artikel</title>
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #e0faff;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #0096c8;
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header img {
            height: 50px;
            margin-right: 10px;
        }

        .welcome-message {
            position: relative;
            color: white;
            text-align: center;
            padding: 40px 20px;
            margin: 20px auto;
            border-radius: 20px;
            max-width: 90%;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .welcome-message::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../../images/welcome-bg.jpg'); /* Path ke gambar */
            background-size: cover;
            background-position: center;
            filter: brightness(0.4); /* Overlay hitam */
            z-index: 1;
        }

        .welcome-message h2,
        .welcome-message p {
            position: relative;
            z-index: 2;
        }

        .welcome-message h2 {
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .welcome-message p {
            font-size: 18px;
            margin: 5px 0;
        }

        .highlights {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
            max-width: 70%;
        }

        .highlights-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            gap: 15px;
        }

        .highlights-content .highlight-item {
            text-align: center;
            max-width: 200px;
        }

        .highlights-content .highlight-item i {
            font-size: 40px;
            color: #0096c8;
            margin-bottom: 10px;
            display: inline-block;
        }

        .highlights-content .highlight-item h4 {
            font-size: 18px;
            margin-bottom: 8px;
            font-weight: bold;
            color: #007ba5;
        }

        .highlights-content .highlight-item p {
            font-size: 14px;
            color: #555;
        }

        .categories {
            margin: 0 auto;
            padding: 20px;
            max-width: 90%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .category-card {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .category-card:hover {
            transform: scale(1.05);
        }

        .category-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .category-card .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            text-transform: capitalize;
            text-align: center;
            letter-spacing: 1px;
        }

        .category-card .overlay:hover {
            background-color: rgba(0, 0, 0, 0.8);
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

        @media (min-width: 768px) {
            .welcome-message h2 {
                font-size: 36px;
            }

            .welcome-message p {
                font-size: 20px;
            }

            .highlights-content .highlight-item h4 {
                font-size: 20px;
            }

            .category-card .overlay {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <a href="#">
            <img src="../../images/rororo.png" alt="Logo">
        </a>
    </div>

    <!-- Welcome Message -->
    <div class="welcome-message">
        <h2>Artikel Resep Ikan FreshyFish</h2>
        <p>Jelajahi berbagai resep lezat dari kategori ikan air tawar, ikan air payau, hingga ikan laut.</p>
        <p>Pilih kategori favorit Anda untuk memulai dan temukan inspirasi masakan ikan segar terbaik!</p>
    </div>

    <!-- Highlights Section -->
    <div class="highlights">
        <div class="highlights-content">
            <div class="highlight-item">
                <i class="fas fa-utensils"></i>
                <h4>Resep Lezat</h4>
                <p>Ratusan resep ikan yang dirancang untuk meningkatkan cita rasa masakan Anda.</p>
            </div>
            <div class="highlight-item">
                <i class="fas fa-heart"></i>
                <h4>Gizi Terjamin</h4>
                <p>Semua resep dirancang untuk memberikan manfaat kesehatan dengan nutrisi yang seimbang.</p>
            </div>
            <div class="highlight-item">
                <i class="fas fa-fish"></i>
                <h4>Bahan Segar</h4>
                <p>Gunakan ikan segar terbaik untuk membuat hidangan berkualitas tinggi.</p>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div id="categories" class="categories">
        <a href="{{ route('articles.byCategory', 'Ikan Air Tawar') }}" class="category-card">
            <img src="../../images/ikan_air_tawar.jpg" alt="Ikan Air Tawar">
            <div class="overlay">Ikan Air Tawar</div>
        </a>
        <a href="{{ route('articles.byCategory', 'Ikan Air Payau') }}" class="category-card">
            <img src="../../images/ikan_air_payau.jpg" alt="Ikan Air Payau">
            <div class="overlay">Ikan Air Payau</div>
        </a>
        <a href="{{ route('articles.byCategory', 'Ikan Laut') }}" class="category-card">
            <img src="../../images/ikan_laut.jpg" alt="Ikan Laut">
            <div class="overlay">Ikan Laut</div>
        </a>
    </div>

    <!-- Footer -->
    <footer>
        © All Rights Reserved By Aetheria
    </footer>
</body>

</html>
