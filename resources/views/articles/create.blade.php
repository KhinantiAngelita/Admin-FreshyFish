<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tambah Artikel</title>
  <!-- CSS -->
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
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
      font-size: 20px;
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
    <h1>Tambah Artikel</h1>
  </div>

  <!-- Content -->
  <div class="content">
    <!-- Form Logo -->
    <div class="form-logo">
      <i class="fas fa-fish"></i>
    </div>

    <h3>Tambah Artikel Baru</h3>

    <!-- Form Tambah Artikel -->
    <form id="addArticleForm" enctype="multipart/form-data">
      @csrf
      <!-- Thumbnail Artikel -->
      <div class="form-group">
        <label for="photo_content">Thumbnail Artikel</label>
        <input type="file" id="photo_content" name="photo_content" accept="image/*" required>
      </div>

      <!-- Judul Artikel -->
      <div class="form-group">
        <label for="title">Judul Artikel</label>
        <input type="text" id="title" name="title" placeholder="Masukkan judul artikel" required>
      </div>

      <!-- Kategori Artikel -->
      <div class="form-group">
        <label for="category_content">Kategori</label>
        <select id="category_content" name="category_content" required>
          <option value="" disabled selected>Pilih Kategori</option>
          <option value="Ikan Laut">Ikan Laut</option>
          <option value="Ikan Air Tawar">Ikan Air Tawar</option>
          <option value="Ikan Air Payau">Ikan Air Payau</option>
        </select>
      </div>

      <!-- Isi Artikel -->
      <div class="form-group">
        <label for="content">Isi Artikel</label>
        <textarea id="content" name="content" rows="5" placeholder="Masukkan isi artikel"></textarea>
      </div>

      <!-- Tombol Simpan Artikel -->
      <button type="submit" class="btn-save">Simpan Artikel</button>
    </form>
  </div>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    let editor; // Variabel untuk menyimpan instance CKEditor

    ClassicEditor
      .create(document.querySelector('#content'))
      .then(instance => {
        editor = instance; // Simpan instance CKEditor
      })
      .catch(error => console.error(error));

    document.querySelector('#addArticleForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const form = document.getElementById('addArticleForm');
      const formData = new FormData(form);

      // Ambil isi dari CKEditor
      const editorContent = editor.getData();
      formData.set('content', editorContent);

      // Validasi isi CKEditor
      if (!editorContent.trim()) {
        Swal.fire({
          icon: 'error',
          title: 'Isi Artikel Kosong',
          text: 'Harap isi artikel sebelum menyimpan.',
        });
        return;
      }

      // Lakukan Fetch API
      fetch('https://freshyfishapi.ydns.eu/api/articles', {
        method: 'POST',
        headers: {
          'Authorization': 'Bearer ' + localStorage.getItem('token'),
          'Accept': 'application/json',
        },
        body: formData,
      })
        .then(async response => {
          if (!response.ok) throw await response.json();
          return response.json();
        })
        .then(data => {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Artikel berhasil disimpan.',
          }).then(() => {
            window.location.href = '/articles';
          });
        })
        .catch(error => {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: error.message || 'Terjadi kesalahan.',
          });
        });
    });
  </script>
</body>

</html>
