<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link href="https://cdn.materialdesignicons.com/7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
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
      <!-- partial:partials/_sidebar.html -->
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
          <!-- Welcome Section -->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold" id="welcomeMessage">Selamat Datang Admin!</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                  <img src="../../images/banner.png" alt="banner" class="img-fluid w-100" style="height: auto; max-height: 100vh; object-fit: cover;" />
            </div>
          </div>


          <!-- Order Details Section -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <p class="card-title">Deskripsi Kegunaan Dashboard Admin</p>
                  <p class="font-weight-500">
                    Dashboard ini membantu Anda memonitor penjualan, performa toko, dan pengelolaan produk dengan mudah dalam satu tempat.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card border-primary shadow">
                <div class="card-body d-flex align-items-center">
                  <!-- Ikon Uang -->
                  <i class="fas fa-money-bill-wave fa-2x text-primary mr-3"></i>
                  <div>
                    <p class="card-title mb-1">Total Keuntungan</p>
                    <h2 class="font-weight-bold">1,250</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Card: Total Produk Terjual -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="icon-columns menu-icon text-primary mr-3" style="font-size: 2rem;"></i>
                    <div>
                      <h4 class="card-title mb-1">Total Produk Terjual</h4>
                      <h2 class="font-weight-bold">1,250</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card: Total Pesanan -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="icon-bar-graph menu-icon text-success mr-3" style="font-size: 2rem;"></i>
                    <div>
                      <h4 class="card-title mb-1">Total Pesanan</h4>
                      <h2 class="font-weight-bold">750</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End of Content Wrapper -->
      </div> <!-- End of Main Panel -->

      </div> <!-- End of Main Panel -->



      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
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
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- Custom js for this page-->
  <script src="../../js/chart.js"></script>
  <!-- End custom js for this page-->
  <!-- End custom js for this page-->

  <script>
    $(document).ready(function() {
      // Fungsi untuk menangani klik pada tombol logout
      $('#logoutButton').on('click', function() {
        // Ambil token dari LocalStorage
        const token = localStorage.getItem('token');

        // Jika token tidak ada, langsung arahkan ke halaman login
        if (!token) {
          window.location.href = '/auth/login';
          return;
        }

        // Kirim permintaan logout ke API
        $.ajax({
          url: 'https://freshyfishapi.ydns.eu/api/auth/logout', // Ganti dengan URL logout API Anda
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
