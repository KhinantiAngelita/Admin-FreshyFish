<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="{{ asset('js/articles.js') }}"></script>

    <style>
        body {
            background-color: #e0faff;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #0096c8;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header img {
            height: 40px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 20px;
            padding: 5px 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .search-bar input {
            border: none;
            outline: none;
            width: 250px;
            padding-left: 10px;
            font-size: 16px;
            color: #333;
        }

        .search-bar input::placeholder {
            color: #aaa;
        }

        .search-bar button {
            background: transparent;
            border: none;
            color: #0096c8;
            cursor: pointer;
            font-size: 18px;
        }

        .search-bar button:hover {
            color: #007ba5;
        }

        .welcome-message {
            background-size: cover;
            background-position: center;
            padding: 40px 20px;
            text-align: center;
            color: white;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 90%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .welcome-message::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            z-index: 1;
        }

        .welcome-message h2,
        .welcome-message p {
            position: relative;
            z-index: 2;
        }

        .welcome-message h2 {
            font-size: 36px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .welcome-message p {
            font-size: 18px;
            margin: 5px 0;
        }

        .content {
            margin: 20px auto;
            padding: 20px;
            max-width: 90%;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-add {
            background-color: #0096c8;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #007ba5;
        }

        .article-list {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .article-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .article-card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease-in-out;
        }

        .article-content {
            flex: 1;
        }

        .article-content h5 {
            font-size: 18px;
            color: #0096c8;
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .article-content p {
            font-size: 14px;
            color: #555;
            margin: 0;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <a href="{{ route('articles.index') }}">
            <img src="../../images/rororo.png" alt="Logo">
        </a>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Cari artikel..." onkeyup="filterArticles()">
            <button><i class="fas fa-search"></i></button>
        </div>
    </div>

    <!-- Welcome Message -->
    <div class="welcome-message" style="background-image: url('../../images/{{ strtolower(str_replace(' ', '_', $category)) }}.jpg');">
        <h2>Artikel Resep Ikan</h2>
    </div>

    <!-- Content -->
    <div class="content">
        <a href="{{ route('articles.create') }}" class="btn-add" id="addArticle">Tambah Artikel</a>
        <div id="articlesList" class="article-list">
            <p class="text-center">Memuat artikel...</p>
        </div>
    </div>

    <!-- SweetAlert dan jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const apiUrl = 'https://freshyfishapi.ydns.eu/api/articles'; // Ganti dengan URL API Anda
            const token = localStorage.getItem('token');

            // Jika token tidak ada
            if (!token) {
                Swal.fire({
                    icon: 'error',
                    title: 'Token Tidak Ada',
                    text: 'Silakan login ulang.',
                });
                return;
            }

            // Fungsi memuat artikel dari API
            function loadArticles() {
                $.ajax({
                    url: apiUrl,
                    type: 'GET',
                    headers: {
                        Authorization: `Bearer ${token}`
                    },
                    success: function (data) {
                        console.log('Data API:', data); // Log seluruh data API
                        const articlesList = $('#articlesList');
                        articlesList.empty();

                        if (data.length === 0) {
                            articlesList.append('<p class="text-center">Belum ada artikel.</p>');
                            return;
                        }

                        // Render artikel ke dalam daftar
                        data.forEach(function (article) {
                        console.log('Artikel:', article); // Log data artikel individual
                        console.log('Photo Content:', article.photo_content); // Log photo_content
                        const articleCard = `
                            <div class="article-card col-lg-14">
                                <div class="article-content">
                                    <img src="https://freshyfishapi.ydns.eu/storage/articles/${article.photo_content}"
                                        alt="${article.title}"
                                        onerror="this.src='https://via.placeholder.com/100';"
                                        class="article-image"> <!-- Menambahkan kelas CSS -->
                                    <h5>${article.title}</h5>
                                    <p><strong>Kategori:</strong> ${article.category_content}</p>
                                    <p>${article.content.substring(0, 100)}...</p>
                                </div>
                                <div class="actions">
                                    <!-- Button Hapus -->
                                    <button class="btn btn-danger" onclick="deleteArticle(${article.ID_article})">Hapus</button>
                                    <!-- Button Edit -->
                                    <a href="/articles/${article.ID_article}/edit" class="btn-edit">Edit</a> <!-- Gunakan URL manual di sini -->
                                </div>
                            </div>
                        `;
                        articlesList.append(articleCard);
                    });

                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', error); // Log error
                        console.error('Response:', xhr.responseText); // Log response server
                        Swal.fire('Error', 'Gagal memuat artikel.', 'error');
                    }
                });
            }

            window.showContentModal = function (title, content) {
                Swal.fire({
                    title: `<div style="text-align: left; font-family: 'Montserrat', sans-serif; font-size: 24px; color: #0096c8;font-weight: bold;">${title}</div>`,
                    html: `<div style="text-align: left; max-height: 500px; overflow-y: auto; padding: 10px; font-size: 20px; line-height: 2;">${content}</div>`,
                    width: '1200px', // Ukuran pop-up lebih lebar
                    showCloseButton: true,
                    focusConfirm: false,
                });
            };

            // Fungsi mengedit artikel
            window.editArticle = function (id) {
                window.location.href = `/articles/${id}/edit`;
            };

            // Fungsi menghapus artikel
            window.deleteArticle = function (id) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah Anda yakin ingin menghapus artikel ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `${apiUrl}/${id}`,
                            type: 'DELETE',
                            headers: {
                                Authorization: `Bearer ${token}`
                            },
                            success: function () {
                                Swal.fire('Berhasil', 'Artikel berhasil dihapus.', 'success');
                                loadArticles(); // Muat ulang artikel setelah penghapusan
                            },
                            error: function () {
                                Swal.fire('Error', 'Gagal menghapus artikel.', 'error');
                            }
                        });
                    }
                });
            };

            // Fungsi pencarian artikel
            window.filterArticles = function () {
            const searchValue = $('#searchInput').val().toLowerCase();
            $('.article-card').each(function () {
                const title = $(this).find('h5').text().toLowerCase();
                const content = $(this).find('p:nth-of-type(2)').text().toLowerCase();
                if (title.includes(searchValue) || content.includes(searchValue)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        };

            // Memuat artikel ketika halaman pertama kali dimuat
            loadArticles();
        });
    </script>
</body>

</html>
