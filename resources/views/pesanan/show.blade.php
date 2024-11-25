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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="container-scroller">
        <!-- Navbar -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../../images/rororo.png" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/lololo.png" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
            <!-- Logout Button -->
            <li class="nav-item">
                <a class="nav-link btn btn-danger text-white px-4 py-2 rounded-pill shadow-sm" href="javascript:void(0)" id="logoutButton">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
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

            <!-- Main Content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-history"></i> History Pesanan</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID Pesanan</th>
                                                    <th>Metode Pembayaran</th>
                                                    <th>Total Harga</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Pemesanan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="pesananTable">
                                                <tr>
                                                    <td colspan="6">Memuat data...</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function getPesanan() {
        var token = localStorage.getItem('token');
        if (!token) {
            alert('User tidak terautentikasi!');
            return;
        }

        // AJAX request untuk mendapatkan daftar pesanan
        $.ajax({
            url: 'https://freshyfishapi.ydns.eu/api/pesanan/histori',
            type: 'GET',
            dataType: 'json',
            headers: {
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json'
            },

            success: function(response) {
                console.log('Data pesanan berhasil diambil:', response);

                // Pastikan data ada di dalam `orders`
                if (response.orders && Array.isArray(response.orders) && response.orders.length > 0) {
                    let pesananList = ''; // Tempat menyimpan elemen HTML untuk pesanan

                    response.orders.forEach(function(pesanan) {
                        // Tentukan kelas tombol berdasarkan status pesanan
                        const statusClass = pesanan.status === 'completed' ? 'btn-success' : 'btn-secondary';
                        const statusText = pesanan.status === 'completed' ? 'Completed' : pesanan.status;

                        pesananList += `
                            <tr>
                                <td>${pesanan.ID_pesanan}</td>
                                <td>${pesanan.payment_method || 'N/A'}</td>
                                <td>Rp${parseFloat(pesanan.total_price).toLocaleString()}</td>
                                <td>
                                    <button class="btn-green btn-sm">${statusText}</button>
                                </td>
                                <td>${pesanan.order_date || 'N/A'}</td>
                            </tr>

                        `;
                    });

                    // Render hasil ke dalam tabel
                    $('#pesananTable').html(pesananList);

                } else {
                    $('#pesananTable').html('<tr><td colspan="6">Tidak ada data pesanan ditemukan.</td></tr>');
                }
            },

            error: function(xhr, status, error) {
                console.error('Error fetching pesanan data: ', error);
                alert('Terjadi kesalahan saat mengambil data pesanan.');
            }
        });
    }

    // Panggil fungsi getPesanan saat halaman dimuat
    $(document).ready(function() {
        getPesanan();
    });

    </script>

</body>

</html>
