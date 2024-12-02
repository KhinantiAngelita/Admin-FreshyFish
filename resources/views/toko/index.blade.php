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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
            <div class="theme-setting-wrapper shadow">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel shadow">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected shadow-sm" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options shadow-sm" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success shadow"></div>
                        <div class="tiles warning shadow"></div>
                        <div class="tiles danger shadow"></div>
                        <div class="tiles info shadow"></div>
                        <div class="tiles dark shadow"></div>
                        <div class="tiles default shadow"></div>
                    </div>
                </div>
            </div>
            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas shadow" id="sidebar">
                <ul class="nav">
                    <!-- Dashboard Menu Item -->
                    <li class="nav-item @if(request()->is('dashboard*')) active @endif shadow-sm">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <!-- Toko Menu Item -->
                    <li class="nav-item @if(request()->is('toko*')) active @endif shadow-sm">
                        <a class="nav-link" href="{{ route('toko.index') }}">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Toko</span>
                        </a>
                    </li>
                    <!-- Produk Menu Item -->
                    <li class="nav-item @if(request()->is('produk*')) active @endif shadow-sm">
                        <a class="nav-link" href="{{ route('produk.show') }}">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Produk</span>
                        </a>
                    </li>
                    <!-- Pesanan Menu Item -->
                    <li class="nav-item @if(request()->is('pesanan*')) active @endif shadow-sm">
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
                    <div class="col-lg-50 grid-margin stretch-card">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-store mr-2"></i> Toko
                                </h4>

                                <p class="card-description">Detail Toko Anda</p>
                                <form id="editStoreForm" class="forms-sample" method="POST" action="#" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_toko">Nama Toko</label>
                                        <input type="text" class="form-control shadow-sm" id="nama_toko" name="nama_toko" placeholder="Nama Toko" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_toko">Alamat Toko</label>
                                        <input type="text" class="form-control shadow-sm" id="alamat_toko" name="alamat_toko" placeholder="Alamat Toko" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi_toko">Deskripsi Ikan</label>
                                        <textarea class="form-control shadow-sm" id="deskripsi_toko" rows=4 name="deskripsi_toko" placeholder="Deskripsi Toko" required readonly></textarea>
                                    </div>
                                    <button type="button" id="editButton" class="btn btn-primary shadow">Edit</button>
                                    <button type="button" id="deleteButton" class="btn btn-danger shadow">Hapus Toko</button>
                                    <button type="button" id="updateButton" class="btn btn-primary shadow" style="display:none;">Update</button>
                                    <a href="{{ route('toko.index') }}" id="cancelButton" class="btn btn-inverse-dark btn-fw shadow" style="display:none;">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Success for Update -->
            <div class="modal fade shadow" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
                <div class="modal-dialog shadow" role="document">
                    <div class="modal-content shadow-lg">
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
                            <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
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
        $(document).ready(function() {
            const token = localStorage.getItem('token');
            if (!token) {
                alert('Anda harus login terlebih dahulu.');
                window.location.href = '/auth/login'; // Redirect to login page
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
                            window.location.href = '/dashboard'; // Redirect to dashboard if role is not 2
                            return;
                        }

                        const ID_toko = response.data.ID_toko;
                        if (ID_toko) {
                            localStorage.setItem('ID_toko', ID_toko);
                            loadStoreData(ID_toko);
                        } else {
                            createStore();
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengambil data user. Coba lagi.');
                        window.location.href = '/auth/login';
                    }
                });
            }

            function createStore() {
                // Simulate store creation request
                const storeData = {
                    store_name: "Nama Toko Baru",
                    store_address: "Alamat Toko",
                    description_store: "Deskripsi Toko"
                };

                $.ajax({
                    url: 'https://freshyfishapi.ydns.eu/api/toko/create',
                    type: 'POST',
                    data: JSON.stringify(storeData),
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        const ID_toko = response.data.ID_toko;
                        localStorage.setItem('ID_toko', ID_toko);

                        Swal.fire({
                            icon: 'success',
                            title: 'Toko Anda sudah dibuka',
                            text: 'Anda akan diarahkan ke dashboard.',
                            confirmButtonText: 'OK',
                            customClass: {
                                popup: 'custom-swal-popup' // Kelas CSS untuk popup
                            }
                        }).then(() => {
                            window.location.href = '/dashboard';
                        });
                    },
                    error: function() {
                        alert('Gagal membuat toko. Coba lagi.');
                    }
                });
            }

            function loadStoreData(ID_toko) {
                $.ajax({
                    url: 'https://freshyfishapi.ydns.eu/api/toko/' + ID_toko,
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        $('#nama_toko').val(response.store_name);
                        $('#alamat_toko').val(response.store_address);
                        $('#deskripsi_toko').val(response.description_store);
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat data toko. Coba lagi.');
                    }
                });
            }

            // Trigger data fetch and store creation check
            getUserData();

            $('#editButton').click(function() {
                $('#nama_toko, #alamat_toko, #deskripsi_toko').prop('readonly', false);
                $('#editButton').hide();
                $('#updateButton, #cancelButton').show();
            });

            $(document).on('click', '#updateButton', function() {
                const ID_toko = localStorage.getItem('ID_toko');
                var storeData = {
                    store_name: $('#nama_toko').val(),
                    store_address: $('#alamat_toko').val(),
                    description_store: $('#deskripsi_toko').val()
                };

                $.ajax({
                    url: 'https://freshyfishapi.ydns.eu/api/toko/' + ID_toko,
                    type: 'PUT',
                    data: JSON.stringify(storeData),
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Toko Berhasil Diperbaharui',
                            confirmButtonText: 'Tutup'
                        }).then(() => {
                            loadStoreData(ID_toko);
                            $('#nama_toko, #alamat_toko, #deskripsi_toko').prop('readonly', true);
                            $('#editButton').show();
                            $('#updateButton, #cancelButton').hide();
                        });
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memperbarui data toko.');
                    }
                });
            });

            $(document).on('click', '#deleteButton', function() {
                const ID_toko = localStorage.getItem('ID_toko');
                if (!ID_toko) {
                    alert('ID Toko tidak ditemukan.');
                    return;
                }

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Toko Anda akan dihapus, dan Anda akan diarahkan ke halaman login.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus toko!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'custom-swal-popup' // Kelas CSS untuk popup
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'https://freshyfishapi.ydns.eu/api/toko/delete/' + ID_toko,
                            type: 'DELETE',
                            headers: {
                                'Authorization': 'Bearer ' + token,
                                'Accept': 'application/json'
                            },
                            success: function() {
                                Swal.fire('Toko Berhasil Dihapus', 'Anda akan diarahkan ke halaman login.', 'success').then(() => {
                                    localStorage.removeItem('token');
                                    localStorage.removeItem('ID_toko');
                                    window.location.href = '/auth/login';
                                });
                            },
                            error: function() {
                                alert('Gagal menghapus toko.');
                            }
                        });
                    }
                });
            });

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
