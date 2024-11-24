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

    .btn-container {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .btn-save,
    .btn-cancel {
      padding: 15px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-save {
      background-color: #0096c8;
      color: white;
    }

    .btn-save:hover {
      background-color: #007bb5;
    }

    .btn-cancel {
      background-color: #dc3545;
      color: white;
    }

    .btn-cancel:hover {
      background-color: #c82333;
    }
  </style>
</head>

<body>
  <div class="header">
    <a href="{{ route('articles.index') }}">
      <img src="../../images/rororo.png" alt="Logo">
    </a>
    <h1>Edit Artikel</h1>
  </div>

  <div class="content">
    <h3>Edit Artikel</h3>
    <form id="editArticleForm" enctype="multipart/form-data">
      @csrf
      <!-- Foto Artikel -->
      <div class="form-group">
        <label for="photo_content">Foto Artikel</label>
        <input type="file" id="photo_content" name="photo_content">
        <img id="articleImage" src="" alt="Foto Artikel" width="150px" class="mt-2" style="display: none;">
      </div>

      <!-- Judul -->
      <div class="form-group">
        <label for="title">Judul Artikel</label>
        <input type="text" id="title" name="title" placeholder="Masukkan judul artikel" required>
      </div>

      <!-- Kategori -->
      <div class="form-group">
        <label for="category_content">Kategori</label>
        <select id="category_content" name="category_content" required>
          <option value="Ikan Laut">Ikan Laut</option>
          <option value="Ikan Air Tawar">Ikan Air Tawar</option>
          <option value="Ikan Air Payau">Ikan Air Payau</option>
        </select>
      </div>

      <!-- Konten -->
      <div class="form-group">
        <label for="content">Isi Artikel</label>
        <textarea id="content" name="content" rows="5" placeholder="Masukkan isi artikel" required></textarea>
      </div>

      <div class="btn-container">
        <button type="submit" class="btn-save">Simpan Perubahan</button>
        <button type="button" class="btn-cancel" id="cancelButton">Batal</button>
      </div>
    </form>
  </div>

  <script>
    $(document).ready(function () {

        // Define articleId before using it
        const articleId = {{ $articleId }}; // Diteruskan dari Blade
        console.log('Article ID:', articleId); // Log articleId for debugging

        const apiUrl = `https://freshyfishapi.ydns.eu/api/articles/${articleId}`;
        console.log('API URL:', apiUrl); // Log apiUrl for debugging

        const token = localStorage.getItem('token');
        console.log('Token:', token); // Log token for debugging

        // Fungsi untuk memuat data artikel
        function loadArticle() {
            console.log(`Memuat artikel dengan ID: ${articleId}`);
            $.ajax({
                url: `${apiUrl}`,
                type: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                },
                success: function (data) {
                    console.log('Data artikel berhasil dimuat:', data);
                    if (data) {
                        $('#title').val(data.title || '');
                        $('#category_content').val(data.category_content || '');
                        $('#content').val(data.content || '');

                        // Tampilkan preview foto dengan path lengkap
                        if (data.photo_content) {
                            $('#articleImage').attr('src', `https://freshyfishapi.ydns.eu/storage/photo_content/${data.photo_content}`).show();
                        }
                    }

                    // Inisialisasi CKEditor
                    ClassicEditor.create(document.querySelector('#content')).catch(error => {
                        console.error('Error in CKEditor:', error);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Gagal memuat data artikel:', status, error);
                    Swal.fire('Error', 'Gagal memuat data artikel!', 'error');
                    console.log('Error details:', xhr.responseText); // Log detailed error response
                }
            });
        }

        // Fungsi menyimpan perubahan artikel
        $('#editArticleForm').submit(function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const fileInput = $('#photo_content')[0].files[0];

            console.log('File input:', fileInput); // Log file input for debugging

            if (fileInput) {
                formData.append('photo_content', fileInput);
                console.log('File attached:', fileInput.name); // Log file name
            }

            console.log('Mengirim data untuk diperbarui:', formData);

            $.ajax({
                url: `${apiUrl}`,
                type: 'PUT',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    console.log('Artikel berhasil diperbarui.');
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Artikel berhasil diperbarui.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = '{{ route("articles.index") }}';
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Gagal memperbarui artikel:', status, error);
                    console.log('Error details:', xhr.responseText); // Log detailed error response
                    Swal.fire('Error', 'Gagal memperbarui artikel!', 'error');
                }
            });
        });

        // Fungsi membatalkan proses edit
        $('#cancelButton').on('click', function () {
            Swal.fire({
                title: 'Batalkan Perubahan?',
                text: 'Anda yakin ingin kembali tanpa menyimpan perubahan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Kembali',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Perubahan dibatalkan, kembali ke daftar artikel');
                    window.location.href = '{{ route("articles.index") }}';
                }
            });
        });

        // Fungsi preview gambar
        $('#photo_content').on('change', function (e) {
            const file = e.target.files[0];
            console.log('File selected for preview:', file); // Log selected file for preview
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#articleImage').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });

        // Panggil fungsi loadArticle saat halaman dimuat
        loadArticle();
    });
</script>



</body>

</html>
