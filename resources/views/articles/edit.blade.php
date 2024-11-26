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

    .btn-save {
      background-color: #0096c8;
      color: white;
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
      <div class="form-group">
        <label for="photo_content">Foto Artikel</label>
        <input type="file" id="photo_content" name="photo_content">
        <img id="articleImage" src="" alt="Foto Artikel" width="150px" class="mt-2" style="display: none;">
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
        console.log("Article ID:", articleId);

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
                    console.log("Loaded Data:", data);

                    $('#title').val(data.title);
                    $('#category_content').val(data.category_content);
                    if (data.photo_content) {
                        const imageUrl = `https://freshyfishapi.ydns.eu/storage/articles/${data.photo_content}`;
                        $('#articleImage').attr('src', imageUrl).show();
                    }

                    ClassicEditor.create(document.querySelector('#content'))
                        .then(editor => {
                            editorInstance = editor;
                            editor.setData(data.content || '');
                        })
                        .catch(error => console.error("Editor Error:", error));
                },
                error: function () {
                    Swal.fire('Error', 'Gagal memuat artikel.', 'error');
                }
            });
        }

        $('#editArticleForm').submit(function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            if (editorInstance) {
                formData.set('content', editorInstance.getData());
            }

            $.ajax({
                url: apiUrl,
                type: 'PUT', // Ubah ke POST jika PUT tidak diterima
                headers: { 'Authorization': `Bearer ${token}` },
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire('Sukses', 'Artikel berhasil diperbarui.', 'success').then(() => {
                        window.location.href = '{{ route("articles.index") }}';
                    });
                },
                error: function (xhr) {
                    let errorMessage = 'Gagal memperbarui artikel.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire('Error', errorMessage, 'error');
                }
            });
        });

        $('#cancelButton').click(() => {
            window.location.href = '{{ route("articles.index") }}';
        });

        loadArticle();
    });
  </script>
</body>

</html>
