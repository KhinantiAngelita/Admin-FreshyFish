<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="{{ asset('js/articles.js') }}"></script>

    <style>
        /* Umum */
        body {
            background-color: #f5fafd;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header */
        .header-area {
            position: sticky;
            top: 0;
            background-color: #0096c8;
            padding: 10px 0;
            z-index: 999;
            box-shadow: 0 5px 7px rgba(0, 0, 0, 0.2);
        }

        /* Menyusun Navbar secara fleksibel */
        .main-nav {
            display: flex;
            justify-content: space-between; /* Menyusun logo dan menu navbar dengan jarak */
            align-items: center;
            height: 60px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Menyusun logo */
        .main-nav .logo img {
            height: 70px;
            width: auto;
            padding-top: 2px;
        }

        /* Menyusun menu navbar */
        .main-nav .nav {
            display: flex;
            align-items: center;
            margin: 0;
        }

        .main-nav .nav li {
            list-style: none;
            margin: 0 17px;
        }

        .main-nav .nav a {
            font-size: 16px;
            color: #ffffff;
            text-decoration: none;
            text-transform: capitalize;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .main-nav .nav li a.active,
        .main-nav .nav li a:hover {
            color: #4ae2ff;
        }

        .main-nav .nav li a:hover {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 20px;
            padding: 5px 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .search-bar input {
            border: none;
            outline: none;
            width: 250px; /* Ukuran input pencarian */
            padding: 8px;
            font-size: 16px;
            color: #333;
            border-radius: 20px;
        }

        .search-bar input::placeholder {
            color: #aaa;
        }

        .search-bar button {
            background: transparent;
            border: none;
            color: #0096c8;
            cursor: pointer;
            font-size: 20px;
        }

        .search-bar button:hover {
            color: #007ba5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-nav .nav {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }

            .search-bar {
                margin-top: 10px;
            }

            .header-area .logo img {
                height: 60px;
            }

            .search-bar input {
                width: 200px; /* Lebih kecil pada perangkat mobile */
            }
        }

        /* Welcome Section */
        .welcome-message {
            text-align: center;
            color: white;
            background-image: linear-gradient(to bottom right, #007ba5, #0096c8);
            padding: 40px 20px;
            margin-bottom: 30px;
        }

        .welcome-message h2 {
            font-size: 36px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        /* Konten */
        .content {
            margin: 0 auto;
            padding: 20px;
            max-width: 1200px;
        }

        /* Tombol Tambah */
        .btn-add {
            background-color: #0096c8;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .btn-add:hover {
            background-color: #007ba5;
        }

        /* Daftar Artikel */
        .article-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .article-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .article-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .article-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .article-content {
            padding: 15px;
        }

        .article-content h5 {
            font-size: 18px;
            color: #0096c8;
            margin-bottom: 10px;
        }

        .article-content p {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 15px;
            border-top: 1px solid #f0f0f0;
        }

        /* Tombol Actions */
        .btn-detail {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-detail:hover {
            background-color: #0056b3;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>

</head>

<body>
    <div class="header-area">
        <div class="main-nav">
            <!-- Logo -->
            <div class="logo">
                <a href="/">
                    <img src="../../images/rororo.png" alt="Logo">
                </a>
            </div>

            <!-- Menu Navbar -->
            <ul class="nav">
                <li><a href="/">Home</a></li>
                <li><a href="/articles">Artikel</a></li>
                <li><a href="/auth/login">Login</a></li>
            </ul>

            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Cari artikel...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>

    <div class="welcome-message">
        <h2>Artikel Resep Ikan</h2>
        <p>Temukan berbagai inspirasi resep berbahan dasar ikan segar!</p>
    </div>

    <div class="content">
        <a href="{{ route('articles.create') }}" class="btn-add" id="addArticle">Tambah Artikel</a>
        <div id="articlesList" class="article-list">
            <p class="text-center">Memuat artikel...</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const apiUrl = 'https://freshyfishapi.ydns.eu/api/articles';
            const token = localStorage.getItem('token');

            if (!token) {
                Swal.fire({
                    icon: 'error',
                    title: 'Token Tidak Ada',
                    text: 'Silakan login ulang.',
                });
                return;
            }

            function loadArticles() {
                $.ajax({
                    url: apiUrl,
                    type: 'GET',
                    headers: {
                        Authorization: `Bearer ${token}`
                    },
                    success: function (data) {
                        const articlesList = $('#articlesList');
                        articlesList.empty();

                        if (data.length === 0) {
                            articlesList.append('<p class="text-center">Belum ada artikel.</p>');
                            return;
                        }

                        data.forEach(function (article) {
                            const articleCard = `
                                <div class="article-card">
                                    <img src="https://freshyfishapi.ydns.eu/storage/articles/${article.photo_content}" alt="${article.title}">
                                    <div class="article-content">
                                        <h5>${article.title}</h5>
                                        <p><strong>Kategori:</strong> ${article.category_content}</p>
                                        <p>${article.content.substring(0, 100)}...</p>
                                    </div>
                                    <div class="actions">
                                        <button class="btn-detail" onclick="showContentModal('${article.photo_content}', '${article.title}', '${article.category_content}', '${article.content}')">Detail</button>
                                        <a href="/articles/${article.ID_article}/edit" class="btn-edit">Edit</a>
                                        <button class="btn-delete" onclick="deleteArticle(${article.ID_article})">Hapus</button>
                                    </div>
                                </div>
                            `;
                            articlesList.append(articleCard);
                        });
                    },
                    error: function () {
                        Swal.fire('Error', 'Gagal memuat artikel.', 'error');
                    }
                });
            }

            function filterArticles() {
                const searchValue = $('#searchInput').val().toLowerCase();
                $('.article-card').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
                });
            }

            window.showContentModal = function (photo, title, category, content) {
                Swal.fire({
                    html: `
                        <div style="text-align: left;">
                            <img src="https://freshyfishapi.ydns.eu/storage/articles/${photo}" alt="${title}" style="width: 100%; margin-bottom: 15px;">
                            <h2>${title}</h2>
                            <p><strong>Kategori:</strong> ${category}</p>
                            <p>${content}</p>
                        </div>
                    `
                });
            };

            window.deleteArticle = function (id) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Artikel ini akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `${apiUrl}/${id}`,
                            type: 'DELETE',
                            headers: {
                                Authorization: `Bearer ${token}`
                            },
                            success: function () {
                                Swal.fire('Berhasil!', 'Artikel telah dihapus.', 'success');
                                loadArticles();
                            },
                            error: function () {
                                Swal.fire('Error', 'Gagal menghapus artikel.', 'error');
                            }
                        });
                    }
                });
            };

            loadArticles();
            $('#searchInput').on('keyup', filterArticles);
        });
    </script>
</body>

</html>
