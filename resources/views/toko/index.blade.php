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
                <a class="navbar-brand brand-logo mr-2" href="index.html"><img src="../../images/rororo.png" class="mr-1" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/lololo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="../../images/faces/face28.jpg" alt="profile" />
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
                                    <button type="button" id="deleteButton" class="btn btn-danger">Hapus Toko</button>
                                    <button type="button" id="updateButton" class="btn btn-primary mr-2" style="display:none;">Update</button>
                                    <a href="{{ route('toko.index') }}" id="cancelButton" class="btn btn-inverse-dark btn-fw" style="display:none;">Cancel</a>
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
                        'Authorization': 'Bearer ' + token
                    },
                    success: function() {
                        localStorage.removeItem('token');
                        localStorage.removeItem('ID_toko');
                        window.location.href = '/auth/login';
                    },
                    error: function() {
                        window.location.href = '/auth/login';
                    }
                });
            });
        });
    </script>



</body>

</html>