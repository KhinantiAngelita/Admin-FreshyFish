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
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .article-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .article-card:hover {
            transform: translateY(-5px);
        }

        .article-card h5 {
            font-size: 20px;
            color: #0096c8;
            margin-bottom: 10px;
        }

        .article-card p {
            font-size: 16px;
            color: #555;
        }

        .article-card .actions {
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
        <h2>Artikel Resep {{ $category }}</h2>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Button untuk menambah artikel -->
        <a href="{{ route('articles.create') }}" class="btn-add">Tambah Resep</a>

        <!-- Daftar Artikel -->
        <div id="articlesList" class="article-list">
            <!-- Loop untuk menampilkan artikel -->
            @forelse ($articles as $article)
                <div class="article-card" data-title="{{ strtolower($article['title']) }}">
                    <div>
                        <h5>{{ $article['title'] }}</h5>
                        <p><strong>Kategori:</strong> {{ $article['category_content'] }}</p>
                        <p>{!! Str::limit($article['content'], 100, '...') !!}</p>
                    </div>
                    <div class="actions">
                        <a href="{{ route('articles.edit', $article['id']) }}" class="btn-edit">Edit</a>
                        <a href="{{ route('articles.delete', $article['id']) }}" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</a>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada artikel dalam kategori ini.</p>
            @endforelse
        </div>
    </div>

 <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
        const apiUrl = 'https://freshyfishapi.ydns.eu/api/articles';
        const token = localStorage.getItem('token');

        // Function to load articles
        function loadArticles() {
            $.ajax({
                url: apiUrl,
                type: 'GET',
                headers: {
                    Authorization: `Bearer ${token}`
                },
                success: function (data) {
                    const articlesList = $('#articlesList');
                    articlesList.empty(); // Clear current list of articles
                    data.forEach(function (article) {
                        const articleCard = `
                            <div class="article-card" data-id="${article.id}">
                                <h5>${article.title}</h5>
                                <p>${article.content}</p>
                                <button class="btn-edit">Edit</button>
                                <button class="btn-delete">Delete</button>
                            </div>
                        `;
                        articlesList.append(articleCard);
                    });
                },
                error: function (error) {
                    console.log('Error fetching articles:', error);
                }
            });
        }

        // Event listener for the Edit button
        $(document).on('click', '.btn-edit', function () {
            const articleId = $(this).closest('.article-card').data('id');
            console.log('Article ID to edit:', articleId);
            try {
                window.location.href = `/articles/${articleId}/edit`;
                console.log(`Navigating to: /articles/${articleId}/edit`);
            } catch (error) {
                console.error('Error navigating to edit page:', error);
            }
        });

        // Event listener for the Delete button
        $(document).on('click', '.btn-delete', function () {
            const articleId = $(this).closest('.article-card').data('id');
            console.log('Article ID to delete:', articleId);

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Artikel ini akan dihapus permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send DELETE request to delete the article
                    $.ajax({
                        url: `${apiUrl}/${articleId}`,
                        type: 'DELETE',
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        success: function () {
                            console.log(`Deleted article ID: ${articleId}`);
                            Swal.fire('Deleted!', 'Artikel berhasil dihapus.', 'success');
                            loadArticles(); // Reload articles after deletion
                        },
                        error: function (xhr) {
                            const errorMessage = xhr.responseJSON?.message || 'Gagal menghapus artikel!';
                            console.error('Error deleting article:', errorMessage);
                            Swal.fire('Error', errorMessage, 'error');
                        }
                    });
                }
            });
        });

        // Initial load of articles
        loadArticles();
    });

    </script>
</body>
</html>
