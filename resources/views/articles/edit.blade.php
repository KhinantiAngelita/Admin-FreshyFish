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
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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

    .content {
      margin: 40px auto;
      padding: 30px;
      max-width: 90%;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
    }

    .content h3 {
      color: #0096c8;
      margin-bottom: 20px;
      font-weight: bold;
      text-align: center;
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
    }

    .form-group textarea {
      resize: none;
    }

    #articleImage {
      margin-top: 10px;
      display: block;
      width: 100px;
      height: auto;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .btn-container {
      display: flex;
      justify-content: center;
      gap: 15px;
    }

    .btn-save,
    .btn-cancel {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
    }

    .btn-save {
      background-color: #0096c8;
      color: white;
    }

    .btn-save:hover {
      background-color: #007aa3;
      transform: scale(1.05);
    }

    .btn-cancel {
      background-color: #dc3545;
      color: white;
    }

    .btn-cancel:hover {
      background-color: #c82333;
      transform: scale(1.05);
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
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

  <div class="content">
    <h3>Edit Artikel</h3>
    <form id="editArticleForm" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="photo_content">Foto Artikel</label>
        <input type="file" id="photo_content" name="photo_content" accept="image/*">
        <img id="articleImage" src="" alt="Foto Artikel" style="display: none;">
      </div>
      <div class="form-group">
        <label for="title">Judul Artikel</label>
        <input type="text" id="title" name="title" placeholder="Masukkan judul artikel" required>
      </div>
      <div class="form-group">
        <label for="category_content">Kategori</label>
        <select id="category_content" name="category_content" required>
          <option value="Ikan Laut">Ikan Laut</option>
          <option value="Ikan Air Tawar">Ikan Air Tawar</option>
          <option value="Ikan Air Payau">Ikan Air Payau</option>
        </select>
      </div>
      <div class="form-group">
        <label for="content">Isi Artikel</label>
        <textarea id="content" name="content" rows="5" placeholder="Masukkan isi artikel"></textarea>
      </div>
      <div class="btn-container">
        <button type="submit" class="btn-save">Simpan Perubahan</button>
        <button type="button" class="btn-cancel" id="cancelButton">Batal</button>
      </div>
    </form>
  </div>

  <script>
    $(document).ready(function () {
        const articleId = {{ $articleId ?? 'null' }};
        const apiUrl = `https://freshyfishapi.ydns.eu/api/articles/${articleId}`;
        const token = localStorage.getItem('token');

        if (!token) {
            Swal.fire('Error', 'Token tidak ditemukan. Silakan login.', 'error');
            return;
        }

        let editorInstance;

        function loadArticle() {
            $.ajax({
                url: apiUrl,
                type: 'GET',
                headers: { 'Authorization': `Bearer ${token}` },
                success: function (data) {
                    $('#title').val(data.title);
                    $('#category_content').val(data.category_content);
                    if (data.photo_content) {
                        $('#articleImage').attr('src', `https://freshyfishapi.ydns.eu/storage/articles/${data.photo_content}`).show();
                    }
                    ClassicEditor.create(document.querySelector('#content'))
                        .then(editor => {
                            editorInstance = editor;
                            editor.setData(data.content || '');
                        })
                        .catch(console.error);
                },
                error: () => Swal.fire('Error', 'Gagal memuat artikel.', 'error'),
            });
        }

        $('#photo_content').change(function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#articleImage').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });

        $('#editArticleForm').submit(function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('_method', 'PUT');
            if (editorInstance) formData.set('content', editorInstance.getData());

            $.ajax({
                url: apiUrl,
                type: 'POST',
                headers: { 'Authorization': `Bearer ${token}` },
                data: formData,
                processData: false,
                contentType: false,
                success: () => Swal.fire('Sukses', 'Artikel berhasil diperbarui.', 'success')
                                    .then(() => window.location.href = '{{ route("articles.index") }}'),
                error: (xhr) => Swal.fire('Error', xhr.responseJSON?.message || 'Gagal memperbarui artikel.', 'error'),
            });
        });

        $('#cancelButton').click(() => window.location.href = '{{ route("articles.index") }}');
        loadArticle();
    });
  </script>
</body>

</html>
