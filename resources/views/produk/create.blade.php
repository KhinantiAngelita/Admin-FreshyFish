<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<style>
    .navbar {
      font-family: 'Poppins', sans-serif;
    }

    .navbar-brand {
      font-weight: 600;
      font-size: 1.25rem;
    }

    .navbar-nav .nav-link {
      font-weight: 500;
      font-size: 1rem;
      margin-left: 20px;
    }

    .navbar-nav .nav-link:hover {
      color: #FFB327;
    }

    .navbar-toggler-icon {
      background-color: white;
    }

    .navbar-nav.mx-auto {
      justify-content: center;
    }

    .navbar-nav.ms-auto {
      justify-content: flex-end;
    }

    @media (max-width: 768px) {
      .navbar {
        padding: 10px 15px;
      }

      .navbar-nav .nav-link {
        font-size: 0.9rem;
      }
    }

    .container-fluid.page-body-wrapper {
      margin-top: 20px;
    }

  </style>

<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #0096c8;">
        <div class="container-fluid">
          <!-- Logo di sebelah kiri -->
          <a class="navbar-brand" href="index.html">
            <img src="../../images/rororo.png" alt="logo" style="height: 60px; margin-right: 20px;" />
          </a>

          <!-- Tombol toggle untuk mobile -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Menu Navigasi -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <!-- Menu Home dan Artikel di tengah -->
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('welcome') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('articles.index') }}">Artikel</a>
              </li>
            </ul>

            <!-- Menu Logout di sebelah kanan -->
            <ul class="navbar-nav ms-auto">
              <!-- Tombol Logout di sebelah kanan -->
              <li class="nav-item">
                <a class="nav-link btn btn-danger text-white px-4 py-2 rounded-pill shadow-sm" href="javascript:void(0)" id="logoutButton">
                  <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <!-- Dashboard Menu Item -->
                    <li class="nav-item @if(request()->is('dashboard*')) active @endif">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <!-- Toko Menu Item -->
                    <li class="nav-item @if(request()->is('toko*')) active @endif">
                        <a class="nav-link" href="{{ route('toko.index') }}">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Toko</span>
                        </a>
                    </li>

                    <!-- Produk Menu Item -->
                    <li class="nav-item @if(request()->is('produk*')) active @endif">
                        <a class="nav-link" href="{{ route('produk.show') }}">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Produk</span>
                        </a>
                    </li>

                    <!-- Pesanan Menu Item -->
                    <li class="nav-item @if(request()->is('pesanan*')) active @endif">
                        <a class="nav-link" href="{{ route('pesanan.show') }}">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Pesanan</span>
                        </a>
                    </li>
                </ul>
            </nav>


            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Produk</h4>
                                    <p class="card-description">
                                        Tambahkan Produk Anda
                                    </p>
                                    <form class="forms-sample" id="productForm" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="fish_photo">Foto Produk</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fish_photo" accept="image/*" required>
                                                <label class="custom-file-label" for="fish_photo">Pilih Foto</label>
                                            </div>
                                            <small class="form-text text-muted">Unggah foto produk dengan format JPG, PNG, atau JPEG, max 2 mb.</small>
                                            <div class="mt-3">
                                                <img id="photoPreview" src="" alt="Preview Foto" class="img-thumbnail" style="display: none; max-height: 200px;">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="fish_type">Nama Ikan</label>
                                            <input type="text" class="form-control" id="fish_type" placeholder="Nama Ikan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fish_weight">Berat Ikan</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="fish_weight" placeholder="Berat Ikan" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">kg</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fish_price">Harga Ikan</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="fish_price" placeholder="Harga Ikan" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Rp / kg</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="habitat">Kategori Ikan</label>
                                            <select class="form-control" id="habitat" required>
                                                <option value="Ikan Laut">Ikan Laut</option>
                                                <option value="Ikan Tawar">Ikan Tawar</option>
                                                <option value="Ikan Payau">Ikan Payau</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fish_description">Deskripsi Ikan</label>
                                            <textarea class="form-control" id="fish_description" rows="4" required></textarea>
                                        </div>
                                        <button type="button" id="saveProductBtn" class="btn btn-primary">Simpan Produk</button>
                                        <a href="{{ route('produk.show') }}" class="btn btn-inverse-dark btn-fw">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->

                <!-- Modal -->
                <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSuccessLabel">Produk Berhasil Disimpan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Produk telah berhasil disimpan. Anda akan diarahkan ke halaman produk dalam beberapa detik.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/file-upload.js"></script>
    <script src="../../js/typeahead.js"></script>
    <script src="../../js/select2.js"></script>
    <!-- End custom js for this page-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            const apiUrl = 'https://freshyfishapi.ydns.eu/api/produk';
            const token = localStorage.getItem('token');

            // Jika pengguna belum login
            if (!token) {
                alert('Anda harus login terlebih dahulu.');
                window.location.href = '/auth/login';
                return;
            }

            // Preview Foto Produk
            $('#fish_photo').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#photoPreview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Simpan Produk
            $('#saveProductBtn').click(function() {
                // Validasi input
                if (!$('#fish_photo')[0].files.length || !$('#fish_type').val() || !$('#fish_weight').val() || !$('#fish_price').val() || !$('#habitat').val() || !$('#fish_description').val()) {
                    alert('Harap lengkapi semua field.');
                    return;
                }

                const formData = new FormData();
                formData.append('fish_photo', $('#fish_photo')[0].files[0]);
                formData.append('fish_type', $('#fish_type').val());
                formData.append('fish_weight', $('#fish_weight').val());
                formData.append('fish_price', $('#fish_price').val());
                formData.append('habitat', $('#habitat').val());
                formData.append('fish_description', $('#fish_description').val());
                formData.append('ID_toko', localStorage.getItem('ID_toko')); // Ambil ID_toko dari LocalStorage

                // Kirim data ke API menggunakan AJAX
                $.ajax({
                    url: apiUrl,
                    type: 'POST',
                    data: formData,
                    processData: false, // Mencegah jQuery memproses data
                    contentType: false, // Membiarkan browser mengatur content type
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        // 'Accept': 'application/json'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Produk Berhasil Ditambahkan',
                            text: 'Produk Anda berhasil ditambahkan. Anda akan diarahkan ke halaman daftar produk.',
                            confirmButtonText: 'OK',
                            customClass: {
                                popup: 'custom-swal-popup' // Kelas CSS untuk popup
                            }
                        }).then(() => {
                            window.location.href = "{{ route('produk.show') }}";
                        });
                    },
                    error: function(xhr, status, error) {
                        const errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'Terjadi kesalahan saat menyimpan produk. Coba lagi.';
                        alert(errorMessage);
                        console.log("Error:", error);
                    }
                });
            });

            // Logout
            $('#logoutButton').on('click', function() {
                $.ajax({
                    url: 'https://freshyfishapi.ydns.eu/api/auth/logout',
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function() {
                        localStorage.removeItem('token');
                        localStorage.removeItem('ID_toko');
                        alert('Logout berhasil. Anda akan diarahkan ke halaman login.');
                        window.location.href = '/auth/login';
                    },
                    error: function(xhr) {
                        console.log('Logout Error:', xhr);
                        localStorage.removeItem('token');
                        localStorage.removeItem('ID_toko');
                        window.location.href = '/auth/login';
                    }
                });
            });
        });
    </script>

</body>

</html>
