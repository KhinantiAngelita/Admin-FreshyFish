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
            <a class="navbar-brand brand-logo mr-2"><img src="images/romawei.png" class="mr-1" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini"><img src="images/loioy.png" alt="logo"/></a>
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
                <div class="col-lg-50 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Toko</h4>
                            <p class="card-description">Detail Toko Anda</p>
                            <form id="editStoreForm" class="forms-sample" method="POST" action="#" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_toko">Nama Toko</label>
                                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_toko">Alamat Toko</label>
                                    <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" placeholder="Alamat Toko" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="kategori_toko">Kategori Toko</label>
                                    <select class="form-control" id="kategori_toko" name="kategori_toko" required disabled>
                                        <option value="Ikan Payau">Ikan Payau</option>
                                        <option value="Ikan Laut">Ikan Laut</option>
                                        <option value="Ikan Tawar">Ikan Tawar</option>
                                    </select>
                                </div>

                                <button type="button" id="editButton" class="btn btn-primary mr-2">Edit</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Success for Update -->
        <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalSuccessLabel">Data Toko Berhasil Diperbaharui</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data toko Anda berhasil diperbaharui. Halaman akan diperbarui dengan data terbaru.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
        var storeId = '123'; // Ganti dengan id toko yang sesuai atau ambil dari URL/variabel

        // CORS Proxy URL
        const corsProxy = 'https://cors-anywhere.herokuapp.com/';

        // Load data toko saat halaman dimuat
        function loadStoreData() {
            $.ajax({
                url: corsProxy + 'https://freshyfishapi.ydns.eu/api/toko/' + storeId, // Menggunakan CORS Proxy
                type: 'GET',
                success: function (response) {
                    // Tampilkan data toko di form (hanya untuk menampilkan, readonly)
                    $('#nama_toko').val(response.data.nama_toko);
                    $('#alamat_toko').val(response.data.alamat_toko);
                    $('#kategori_toko').val(response.data.kategori_toko);
                },
                error: function (xhr, status, error) {
                    alert('Terjadi kesalahan saat memuat data toko. Coba lagi.');
                }
            });
        }

        // Load data toko saat halaman dimuat
        loadStoreData();

        // Fungsi untuk mengaktifkan input form ketika tombol Edit diklik
        $('#editButton').click(function () {
            // Aktifkan input form
            $('#nama_toko').prop('readonly', false);
            $('#alamat_toko').prop('readonly', false);
            $('#kategori_toko').prop('disabled', false);

            // Ganti tombol Edit dengan tombol Update
            $('#editButton').text('Update').attr('id', 'updateButton');
        });

        // Fungsi untuk mengupdate data toko
        $(document).on('click', '#updateButton', function () {
            var storeData = {
                id_toko: $('#id_toko').val(),
                nama_toko: $('#nama_toko').val(),
                alamat_toko: $('#alamat_toko').val(),
                kategori_toko: $('#kategori_toko').val(),
            };

            $.ajax({
                url: corsProxy + 'https://freshyfishapi.ydns.eu/api/toko/' + storeId, // Menggunakan CORS Proxy
                type: 'PUT',
                data: storeData,
                success: function (response) {
                    // Tampilkan modal sukses
                    $('#modalSuccess').modal('show');

                    // Setelah 2 detik, refresh data toko dan kembalikan form ke readonly
                    setTimeout(function () {
                        loadStoreData();
                        $('#modalSuccess').modal('hide');
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    alert('Terjadi kesalahan saat memperbarui data toko. Coba lagi.');
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
                success: function (response) {
                    // Jika logout berhasil, hapus token dan arahkan ke halaman login
                    localStorage.removeItem('token');
                    window.location.href = '/auth/login';
                },
                error: function (xhr) {
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
