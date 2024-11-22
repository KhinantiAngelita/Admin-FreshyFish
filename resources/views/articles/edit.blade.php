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
</head>

<body>
  <!-- Header -->
  <div class="header">
    <a href="{{ route('articles.index') }}">
      <img src="../../images/rororo.png" alt="Logo">
    </a>
    <h1>Edit Artikel</h1>
  </div>

  <div class="content">
    <!-- Form Logo -->
    <div class="form-logo">
      <i class="fas fa-edit"></i>
    </div>

    <h3>Edit Artikel</h3>

    <!-- Pesan Error atau Sukses -->
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

    <!-- Form Edit Artikel -->
    <form id="editArticleForm">
      @csrf
      <div class="form-group">
        <label for="title">Judul Artikel</label>
        <input type="text" id="title" name="title" value="{{ $article['title'] }}" placeholder="Masukkan judul artikel" required>
      </div>
      <div class="form-group">
        <label for="category_content">Kategori</label>
        <select id="category_content" name="category_content" required>
          <option value="Ikan Laut" @if ($article['category_content'] === 'Ikan Laut') selected @endif>Ikan Laut</option>
          <option value="Ikan Air Tawar" @if ($article['category_content'] === 'Ikan Air Tawar') selected @endif>Ikan Air Tawar</option>
          <option value="Ikan Air Payau" @if ($article['category_content'] === 'Ikan Air Payau') selected @endif>Ikan Air Payau</option>
        </select>
      </div>
      <div class="form-group">
        <label for="content">Isi Artikel</label>
        <textarea id="content" name="content" rows="5" placeholder="Masukkan isi artikel" required>{{ $article['content'] }}</textarea>
      </div>
      <button type="submit" class="btn-save">Simpan Perubahan</button>
    </form>
  </div>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById('editArticleForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Menghindari form default submit

        const articleId = {{ $article['id'] }}; // ID artikel yang akan diedit
        const token = localStorage.getItem('token');

        if (!token) {
            Swal.fire({
                icon: 'error',
                title: 'Autentikasi Gagal',
                text: 'User tidak terautentikasi!',
            });
            return;
        }

        const formData = new FormData(this);
        formData.append('_method', 'PUT'); // Tambahkan method PUT untuk melakukan update

        fetch(`https://freshyfishapi.ydns.eu/api/articles/${ID_article}`, {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Artikel berhasil diperbarui.',
                });
                window.location.href = '/articles';
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: data.message || 'Terjadi kesalahan saat memperbarui artikel.',
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Gagal memuat artikel.',
            });
        });
    });
  </script>
</body>

</html>
