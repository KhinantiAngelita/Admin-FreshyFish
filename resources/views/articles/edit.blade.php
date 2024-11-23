<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Artikel</title>
  <!-- CSS -->
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    /* Styling untuk halaman */
    body {
      background-color: #eaf4fc;
      font-family: Arial, sans-serif;
    }

    .header {
      background-color: #0096c8;
      color: white;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header img {
      height: 40px;
    }

    .header h1 {
      margin: 0;
      font-size: 18px;
      font-weight: bold;
    }

    .content {
      margin: 40px auto;
      padding: 30px;
      max-width: 90%;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
      position: relative;
    }

    .content h3 {
      color: #0096c8;
      margin-bottom: 20px;
      font-weight: bold;
      text-align: center;
    }

    .form-logo {
      position: absolute;
      top: -15px;
      right: 20px;
      width: 50px;
      height: 50px;
      background-color: #0096c8;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 24px;
    }

    .form-logo i {
      font-size: 24px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
      color: #333;
      display: block;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .form-group textarea {
      resize: none;
    }

    .btn-save {
      background-color: #0096c8;
      color: white;
      padding: 15px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      text-align: center;
      display: block;
      width: 100%;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-save:hover {
      background-color: #007bb5;
    }

    .alert {
      margin-bottom: 20px;
      padding: 15px;
      border-radius: 8px;
      color: white;
      font-size: 14px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .alert-danger {
      background-color: #dc3545;
    }

    .alert-success {
      background-color: #28a745;
    }
  </style>
  <!-- Menyertakan CKEditor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>

<body>
  <!-- Header -->
  <div class="header">
    <!-- Logo untuk kembali ke halaman artikel -->
    <a href="{{ route('articles.index') }}">
      <img src="../../images/rororo.png" alt="Logo">
    </a>
    <h1>Edit Artikel</h1>
  </div>

  <div class="content">
    <!-- Logo pada bagian form -->
    <div class="form-logo">
      <i class="fas fa-edit"></i>
    </div>

    <h3>Edit Artikel</h3>

    <!-- Menampilkan pesan error atau sukses -->
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <!-- Form untuk mengedit artikel -->
    <form id="editArticleForm" enctype="multipart/form-data">
      @csrf
      <!-- Input untuk foto artikel -->
      <div class="form-group">
        <label for="photo_content">Foto Artikel</label>
        <input type="file" id="photo_content" name="photo_content">
        @if ($article->photo_content)
          <img src="{{ asset('storage/' . $article->photo_content) }}" alt="Foto Artikel" width="150px" class="mt-2">
        @endif
      </div>
      <!-- Input untuk judul artikel -->
      <div class="form-group">
        <label for="title">Judul Artikel</label>
        <input type="text" id="title" name="title" placeholder="Masukkan judul artikel" value="{{ old('title', $article->title) }}" required>
      </div>
      <!-- Input untuk memilih kategori artikel -->
      <div class="form-group">
        <label for="category_content">Kategori</label>
        <select id="category_content" name="category_content" required>
          <option value="Ikan Laut" {{ $article->category_content == 'Ikan Laut' ? 'selected' : '' }}>Ikan Laut</option>
          <option value="Ikan Air Tawar" {{ $article->category_content == 'Ikan Air Tawar' ? 'selected' : '' }}>Ikan Air Tawar</option>
          <option value="Ikan Air Payau" {{ $article->category_content == 'Ikan Air Payau' ? 'selected' : '' }}>Ikan Air Payau</option>
        </select>
      </div>
      <!-- Input untuk isi artikel dengan CKEditor -->
      <div class="form-group">
        <label for="content">Isi Artikel</label>
        <textarea id="content" name="content" rows="5" placeholder="Masukkan isi artikel" required>{{ old('content', $article->content) }}</textarea>
      </div>
      <!-- Tombol untuk menyimpan perubahan -->
      <button type="submit" class="btn-save">Simpan Perubahan</button>
    </form>
  </div>

  <!-- SweetAlert untuk notifikasi sukses atau error -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
        // URL API untuk mendapatkan dan mengupdate artikel
        const apiUrl = 'https://freshyfishapi.ydns.eu/api/articles';
        // Mengambil token dari localStorage (harus disesuaikan jika menggunakan otentikasi lain)
        const token = localStorage.getItem('token');
        // ID artikel yang akan diupdate (bisa diambil dari route atau JavaScript)
        const articleId = {{ $articleId }}; // Pastikan $articleId di-pass dengan benar di Blade

        // Fungsi untuk memuat data artikel yang sudah ada
        function loadArticle() {
            $.ajax({
                url: `${apiUrl}/${articleId}`,
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token, // Menambahkan token untuk autentikasi
                },
                success: function (data) {
                    // Isi form dengan data yang diterima dari API
                    $('#title').val(data.title);
                    $('#category_content').val(data.category_content);
                    $('#content').val(data.content);

                    // Inisialisasi CKEditor
                    ClassicEditor.create(document.querySelector('#content')).then(editor => {
                        editor.setData(data.content); // Set data ke CKEditor setelah inisialisasi
                    }).catch(error => {
                        console.error('Error initializing CKEditor:', error);
                    });
                },
                error: function (xhr) {
                    console.error(xhr.responseJSON);
                    Swal.fire('Error', 'Gagal memuat data artikel!', 'error'); // Notifikasi error
                }
            });
        }

        // Fungsi untuk menyimpan perubahan artikel
        $('#editArticleForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            $.ajax({
                url: `${apiUrl}/${articleId}`,
                type: 'PUT',
                headers: {
                    'Authorization': 'Bearer ' + token, // Menambahkan token untuk autentikasi
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    Swal.fire('Berhasil', 'Artikel berhasil diperbarui!', 'success').then(() => {
                        window.location.href = '/articles'; // Ganti dengan URL yang sesuai
                    });
                },
                error: function (xhr) {
                    console.error(xhr.responseJSON);
                    Swal.fire('Error', 'Gagal memperbarui artikel!', 'error');
                }
            });
        });

        // Muat artikel saat halaman dimuat
        loadArticle();
    });
  </script>
</body>

</html>
