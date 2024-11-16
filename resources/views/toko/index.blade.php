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
                                    <label for="deskripsi_toko">Deskripsi Ikan</label>
                                    <textarea class="form-control" id="deskripsi_toko" rows=4 name="deskripsi_toko" placeholder="Deskripsi Toko" required readonly></textarea>
                                </div>

                                <button type="button" id="editButton" class="btn btn-primary mr-2">Edit</button>
                                <button type="button" id="updateButton" class="btn btn-primary mr-2" style="display:none;">Update</button>
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
  <!-- Link SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Script SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            const token = localStorage.getItem('token');
            if (!token) {
                alert('Anda harus login terlebih dahulu.');
                window.location.href = '/auth/login'; // Alihkan ke halaman login
                return;
            }

            function getUserData() {
                $.ajax({
                    url: 'https://freshyfishapi.ydns.eu/api/auth/me',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.data.ID_role !== 2) {
                            alert('Anda tidak memiliki izin untuk mengakses data ini.');
                            window.location.href = '/dashboard'; // Alihkan ke dashboard jika role bukan 2
                            return;
                        }

                        const ID_toko = response.data.ID_toko;
                        localStorage.setItem('ID_toko', ID_toko);
                        loadStoreData(ID_toko);
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat mengambil data user. Coba lagi.');
                        console.log("Error:", error);
                        window.location.href = '/auth/login';
                    }
                });
            }

            getUserData();

            function loadStoreData(ID_toko) {
                $.ajax({
                    url: 'https://freshyfishapi.ydns.eu/api/toko/' + ID_toko,
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        console.log(response);
                        $('#nama_toko').val(response.store_name);
                        $('#alamat_toko').val(response.store_address);
                        $('#deskripsi_toko').val(response.description_store);
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat memuat data toko. Coba lagi.');
                    }
                });
            }

            // Bagian ini mengubah tombol Edit menjadi tombol Update saat klik
            $('#editButton').click(function () {
                if ($('#nama_toko').prop('readonly')) {
                    $('#nama_toko').prop('readonly', false);
                }
                if ($('#alamat_toko').prop('readonly')) {
                    $('#alamat_toko').prop('readonly', false);
                }
                if ($('#deskripsi_toko').prop('readonly')) {
                    $('#deskripsi_toko').prop('readonly', false);
                }

                // Ganti tombol Edit dengan tombol Update
                $('#editButton').hide(); // Sembunyikan tombol Edit
                $('#updateButton').show(); // Tampilkan tombol Update
            });

            // Bagian ini memindahkan SweetAlert ke dalam klik tombol Update
            $(document).on('click', '#updateButton', function () {
                const ID_toko = localStorage.getItem('ID_toko');
                var storeData = {};

                if ($('#nama_toko').prop('readonly') === false) {
                    storeData.store_name = $('#nama_toko').val();
                }
                if ($('#alamat_toko').prop('readonly') === false) {
                    storeData.store_address = $('#alamat_toko').val();
                }
                if ($('#deskripsi_toko').prop('readonly') === false) {
                    storeData.description_store = $('#deskripsi_toko').val();
                }

                $.ajax({
                    url: 'https://freshyfishapi.ydns.eu/api/toko/' + ID_toko,
                    type: 'PUT',
                    data: JSON.stringify(storeData),
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function (response) {
                        // SweetAlert muncul setelah Update berhasil
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Toko Berhasil Diperbaharui',
                            text: 'Data toko Anda berhasil diperbaharui. Halaman akan diperbarui dengan data terbaru.',
                            confirmButtonText: 'Tutup'
                        }).then(() => {
                            // Setelah SweetAlert ditutup, refresh data toko dan kembalikan form ke readonly
                            loadStoreData(ID_toko);
                            $('#nama_toko, #alamat_toko, #deskripsi_toko').prop('readonly', true);

                            // Kembalikan tombol ke Edit setelah update selesai
                            $('#editButton').show(); // Tampilkan tombol Edit
                            $('#updateButton').hide(); // Sembunyikan tombol Update
                        });
                    },
                    error: function (xhr, status, error) {
                        let errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'Terjadi kesalahan saat memperbarui data toko. Coba lagi.';
                        alert(errorMessage);
                        console.log("Error:", error);
                    }
                });
            });

            $('#logoutButton').on('click', function () {
                const token = localStorage.getItem('token');
                if (!token) {
                    window.location.href = '/auth/login';
                    return;
                }

                $.ajax({
                    url: 'https://freshyfishapi.ydns.eu/api/auth/logout',
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        localStorage.removeItem('token');
                        localStorage.removeItem('ID_toko');
                        window.location.href = '/auth/login';
                    },
                    error: function (xhr) {
                        console.log("Error:", xhr);
                        window.location.href = '/auth/login';
                    }
                });
            });
        });
    </script>


</body>

</html>
