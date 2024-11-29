<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
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
                    <li class="nav-item @if(request()->is('dashboard*')) active @endif">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item @if(request()->is('toko*')) active @endif">
                        <a class="nav-link" href="{{ route('toko.index') }}">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Toko</span>
                        </a>
                    </li>
                    <li class="nav-item @if(request()->is('produk*')) active @endif">
                        <a class="nav-link" href="{{ route('produk.show') }}">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Produk</span>
                        </a>
                    </li>
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
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title"><i class="fas fa-history"></i> History Pesanan</h4>
                                        <div>
                                            <button id="exportExcel" class="btn btn-success btn-sm">
                                                <i class="fas fa-file-excel"></i> Export to Excel
                                            </button>
                                            <button id="exportPdf" class="btn btn-danger btn-sm">
                                                <i class="fas fa-file-pdf"></i> Export to PDF
                                            </button>
                                        </div>
                                    </div>
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
                                                    <td colspan="5">Memuat data...</td>
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

    <!-- JavaScript Libraries -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

    <script>
        function exportToExcel(data) {
            const formattedData = data.map(order => ({
                'ID Pesanan': order.ID_pesanan,
                'Metode Pembayaran': order.payment_method || 'N/A',
                'Total Harga': `Rp${parseFloat(order.total_price).toLocaleString()}`,
                'Status': order.status || 'N/A',
                'Tanggal Pemesanan': order.order_date || 'N/A'
            }));

            const ws = XLSX.utils.json_to_sheet(formattedData);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Pesanan');
            XLSX.writeFile(wb, 'Pesanan.xlsx');
        }

        function exportToPdf(data) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            const tableColumns = ['ID Pesanan', 'Metode Pembayaran', 'Total Harga', 'Status', 'Tanggal Pemesanan'];
            const tableRows = data.map(order => [
                order.ID_pesanan,
                order.payment_method || 'N/A',
                `Rp${parseFloat(order.total_price).toLocaleString()}`,
                order.status || 'N/A',
                order.order_date || 'N/A'
            ]);

            doc.text('History Pesanan', 105, 10, { align: 'center' });
            doc.autoTable({
                head: [tableColumns],
                body: tableRows,
                startY: 20
            });
            doc.save('Pesanan.pdf');
        }

        function getPesanan(callback) {
            const token = localStorage.getItem('token');
            if (!token) {
                alert('User tidak terautentikasi!');
                return;
            }

            $.ajax({
                url: 'https://freshyfishapi.ydns.eu/api/pesanan/histori',
                type: 'GET',
                headers: { 'Authorization': 'Bearer ' + token },
                success: function(response) {
                    if (response.orders && response.orders.length > 0) {
                        const rows = response.orders.map(order => `
                            <tr>
                                <td>${order.ID_pesanan}</td>
                                <td>${order.payment_method || 'N/A'}</td>
                                <td>Rp${parseFloat(order.total_price).toLocaleString()}</td>
                                <td><button class="btn btn-success btn-sm">${order.status || 'N/A'}</button></td>
                                <td>${order.order_date || 'N/A'}</td>
                            </tr>
                        `).join('');
                        $('#pesananTable').html(rows);
                        if (callback) callback(response.orders);
                    } else {
                        $('#pesananTable').html('<tr><td colspan="5">Tidak ada data pesanan.</td></tr>');
                    }
                },
                error: function() {
                    alert('Gagal memuat data pesanan.');
                }
            });
        }

        $(document).ready(function() {
            $('#exportExcel').on('click', function() {
                getPesanan(exportToExcel);
            });

            $('#exportPdf').on('click', function() {
                getPesanan(exportToPdf);
            });

            getPesanan();
        });
    </script>
</body>

</html>
