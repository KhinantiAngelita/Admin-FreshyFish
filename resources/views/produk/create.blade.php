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

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-2" href="index.html"><img src="images/romawei.png" class="mr-1" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/loioy.png" alt="logo"/></a>
        </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="javascript:void(0)" id="logoutButton">
                  <i class="ti-power-off text-primary"></i>
                  Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
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
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('toko.index') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Toko</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk.show') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pesanan.show') }}">
                        <i class="icon-grid menu-icon"></i>
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
                                <form class="forms-sample" id="productForm">
                                    <div class="form-group">
                                        <label for="fishName">Nama Ikan</label>
                                        <input type="text" class="form-control" id="fishName" placeholder="Nama Ikan" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="fishWeight">Berat Ikan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="fishWeight" placeholder="Berat Ikan" required>
                                        <div class="input-group-append">
                                        <span class="input-group-text">kg</span>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="fishPrice">Harga Ikan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="fishPrice" placeholder="Harga Ikan" required>
                                        <div class="input-group-append">
                                        <span class="input-group-text">Rp / kg</span>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fishCategory">Kategori Ikan</label>
                                        <select class="form-control" id="fishCategory" required>
                                            <option value="Ikan Laut">Ikan Laut</option>
                                            <option value="Ikan Tawar">Ikan Tawar</option>
                                            <option value="Ikan Payau">Ikan Payau</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fishDescription">Deskripsi Ikan</label>
                                        <textarea class="form-control" id="fishDescription" rows="4" required></textarea>
                                    </div>
                                    <button type="button" id="saveProductBtn" class="btn btn-primary mr-2">Simpan Produk</button>
                                    <a href="{{ route('produk.show') }}" class="btn btn-light">Cancel</a>
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
        <!-- partial:../../partials/_footer.html -->
        <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer> -->
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

<script type="text/javascript">
    $(document).ready(function () {
        // Ketika tombol "Simpan Produk" diklik
        $('#saveProductBtn').click(function () {
            // Ambil data dari form
            let productData = {
                // id_produk: $('#productId').val(),
                // id_toko: $('#storeId').val(),
                nama_ikan: $('#fishName').val(),
                berat_ikan: $('#fishWeight').val(),
                harga_ikan: $('#fishPrice').val(),
                kategori_ikan: $('#fishCategory').val(),
                deskripsi_ikan: $('#fishDescription').val(),
            };

            // Validasi form
            if (!productData.id_produk || !productData.id_toko || !productData.nama_ikan || !productData.berat_ikan || !productData.harga_ikan || !productData.kategori_ikan || !productData.deskripsi_ikan) {
                alert('Harap lengkapi semua field');
                return;
            }

            // Kirim data ke API menggunakan AJAX
            $.ajax({
                url: 'https://cors-anywhere.herokuapp.com/https://freshyfishapi.ydns.eu/api/produk', // Menggunakan proxy CORS
                type: 'POST',
                data: productData, // Data yang dikirimkan
                success: function (response) {
                    // Jika berhasil, tampilkan modal dan alihkan ke produk.show
                    $('#modalSuccess').modal('show'); // Tampilkan modal
                    setTimeout(function () {
                        window.location.href = "{{ route('produk.show') }}"; // Redirect ke halaman produk
                    }, 2000); // Redirect setelah 2 detik
                },
                error: function (xhr, status, error) {
                    // Jika terjadi error
                    alert('Terjadi kesalahan saat menyimpan produk. Coba lagi.');
                }
            });
        });

        // Fungsi untuk menangani klik pada tombol logout
        $('#logoutButton').on('click', function () {
            // Ambil token dari LocalStorage
            const token = localStorage.getItem('token');

            // Jika token tidak ada, langsung arahkan ke halaman login
            if (!token) {
                window.location.href = '/auth/login';
                return;
            }

            // Kirim permintaan logout ke API
            $.ajax({
                url: 'https://example.com/api/logout',  // Ganti dengan URL logout API Anda
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    // Jika logout berhasil, hapus token dan arahkan ke halaman login
                    localStorage.removeItem('token');
                    window.location.href = '/auth/login';
                },
                error: function(xhr) {
                    // Tangani error jika ada masalah dengan API
                    console.log("Error:", xhr);
                    // Arahkan tetap ke login meski ada error
                    window.location.href = '/auth/login';
                }
            });
        });
    });
</script>

</body>

</html>
