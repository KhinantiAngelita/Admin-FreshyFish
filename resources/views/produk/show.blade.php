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
            <a class="navbar-brand brand-logo mr-2" href="index.html"><img src="../../images/rororo.png" class="mr-1" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/lololo.png" alt="logo"/></a>
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
                <li class="nav-item shadow-sm">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item shadow-sm">
                    <a class="nav-link" href="{{ route('toko.index') }}">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Toko</span>
                    </a>
                </li>
                <li class="nav-item shadow-sm">
                    <a class="nav-link" href="{{ route('produk.show') }}">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Produk</span>
                    </a>
                </li>
                <li class="nav-item shadow-sm">
                    <a class="nav-link" href="{{ route('pesanan.show') }}">
                        <i class="icon-bar-graph menu-icon"></i>
                        <span class="menu-title">Pesanan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel shadow">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">List Produk Anda</h4>
                                    <div class="d-flex justify-content-end align-items-center gap-2">
                                        <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm shadow">Tambah Produk Baru</a>
                                        <button id="exportExcel" class="btn btn-success btn-sm shadow">Export to Excel</button>
                                    </div>
                                    {{-- <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm shadow">Tambah Produk Baru</a>
                                    <button id="exportExcel" class="btn btn-primary btn-sm shadow">Export to Excel</button> --}}
                                </div>
                                <p class="card-description"></p>
                                <div class="table-responsive">
                                    <div class="table-scroll" style="overflow-x: auto;">
                                        <table class="table table-striped shadow-sm">
                                            <thead>
                                                <tr>
                                                    <th>id Toko</th>
                                                    <th>id Produk</th>
                                                    <th>Foto Ikan</th>
                                                    <th>Tipe Ikan</th>
                                                    <th>Harga Ikan</th>
                                                    <th>Berat Ikan</th>
                                                    <th>Habitat</th>
                                                    <th>Deskripsi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="productList">
                                                <!-- Produk akan dimuat di sini menggunakan Ajax -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Success for Delete -->
            <div class="modal fade shadow" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
                <div class="modal-dialog shadow" role="document">
                    <div class="modal-content shadow-lg">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSuccessLabel">Produk Berhasil Diedit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Produk berhasil diedit. Halaman akan diperbarui.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Tambahkan library jQuery dan SweetAlert jika belum ada -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        const token = localStorage.getItem('token'); // Ambil token dari localStorage

        if (!token) {
            Swal.fire(
                'Gagal!',
                'Token tidak ditemukan. Anda akan diarahkan ke halaman login.',
                'error'
            ).then(() => {
                window.location.href = '/auth/login';
            });
            return;
        }

        // Fungsi untuk memuat produk dari API
        function loadProducts(callback) {
            $.ajax({
                url: 'https://freshyfishapi.ydns.eu/api/produk', // URL API untuk mengambil data produk
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                },
                success: function (response) {
                    let productList = '';
                    console.log(response);

                    // Validasi respons data
                    if (response && Array.isArray(response)) { // Pastikan response adalah array
                        response.forEach(function (produk) {
                            productList += `
                                <tr>
                                    <td>${produk.ID_toko}</td>
                                    <td>${produk.ID_produk}</td>
                                    <td class="py-1"><img src="https://freshyfishapi.ydns.eu/storage/fish_photos/${produk.fish_photo}" alt="Ikan" style="width: 50px; height: 50px;" /></td>
                                    <td>${produk.fish_type}</td>
                                    <td>${produk.fish_price}</td>
                                    <td>${produk.fish_weight}</td>
                                    <td>${produk.habitat}</td>
                                    <td>${produk.fish_description}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-sm editProduct" data-id="${produk.ID_produk}">Edit</a>
                                        <button class="btn btn-danger btn-sm deleteProduct" data-id="${produk.ID_produk}">Delete</button>
                                    </td>
                                </tr>`;
                        });
                    } else {
                        productList = '<tr><td colspan="9">Tidak ada data produk.</td></tr>';
                    }

                    $('#productList').html(productList);

                    // Ekspor data ke Excel jika callback diterima
                    if (callback) callback(response);
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat memuat produk. Silakan coba lagi.',
                        'error'
                    );
                }
            });
        }

        // Fungsi untuk mengonversi data menjadi file Excel
        function exportToExcel(data) {
            if (!Array.isArray(data)) {
                Swal.fire('Error', 'Data tidak valid untuk ekspor.', 'error');
                return;
            }

            // Format data untuk Excel
            const formattedData = data.map((produk) => ({
                'ID Toko': produk.ID_toko || '',
                'ID Produk': produk.ID_produk || '',
                'Nama Ikan': produk.fish_type || '',
                'Harga Ikan': produk.fish_price || '',
                'Berat Ikan': produk.fish_weight || '',
                'Habitat': produk.habitat || '',
                'Deskripsi': produk.fish_description || '',
            }));

            // Buat workbook
            const ws = XLSX.utils.json_to_sheet(formattedData); // Konversi data JSON ke worksheet
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Produk');

            // Unduh file Excel
            XLSX.writeFile(wb, 'Produk.xlsx');
        }

        // Tombol ekspor Excel
        $('#exportExcel').on('click', function () {
            loadProducts(exportToExcel); // Muat data dan ekspor ke Excel
        });

        // Pengalihan ke halaman edit produk
        $(document).on('click', '.editProduct', function () {
            const ID_produk = $(this).data('id');
            // Mengarahkan ke halaman edit produk berdasarkan ID
            window.location.href = `/produk/edit/${ID_produk}`;
        });

        // Fungsi untuk menghapus produk
        $(document).on('click', '.deleteProduct', function () {
            const ID_produk = $(this).data('id');

            // Konfirmasi penghapusan menggunakan SweetAlert
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Produk ini akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'custom-swal-popup' // CSS class untuk popup
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: `https://freshyfishapi.ydns.eu/api/produk/${ID_produk}`,
                    type: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function (response) {
                        console.log('Produk berhasil dihapus:', response);
                        Swal.fire({
                            title: 'Terhapus!',
                            text: 'Produk berhasil dihapus.',
                            icon: 'success',
                            customClass: {
                                popup: 'custom-swal-popup' // Kelas CSS untuk popup
                            }
                        });
                        loadProducts(); // Refresh data produk setelah penghapusan
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menghapus produk. Silakan coba lagi.',
                            icon: 'error',
                            customClass: {
                                popup: 'custom-swal-popup' // Kelas CSS untuk popup
                            }
                        });
                    }
                });

                }
            });
        });

        // Fungsi untuk logout
        $('#logoutButton').on('click', function () {
            $.ajax({
                url: 'https://freshyfishapi.ydns.eu/api/logout',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                },
                success: function (response) {
                    console.log('Logout berhasil:', response);
                    localStorage.removeItem('token');
                    Swal.fire(
                        'Logout Berhasil!',
                        'Anda telah berhasil logout.',
                        'success'
                    ).then(() => {
                        window.location.href = '/auth/login';
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    localStorage.removeItem('token');
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat logout. Anda akan diarahkan ke halaman login.',
                        'error'
                    ).then(() => {
                        window.location.href = '/auth/login';
                    });
                }
            });
        });

        // Muat produk ketika halaman selesai dimuat
        loadProducts();
    });
</script>



</body>

</html>
