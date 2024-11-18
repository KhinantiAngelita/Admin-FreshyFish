<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <link href="https://cdn.materialdesignicons.com/7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
  <style>
    .fish-card {
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      background: white;
    }

    .fish-card:hover {
      transform: scale(1.05);
    }

    .fish-image {
      height: 150px;
      width: 100%;
      object-fit: cover;
    }

    .fish-card-body {
      padding: 10px;
      text-align: center;
    }

    .fish-title {
      font-weight: bold;
      font-size: 16px;
      margin-bottom: 5px;
    }

    .fish-description {
      font-size: 14px;
      color: #666;
    }

    .section-title {
      font-weight: bold;
      font-size: 20px;
      margin-bottom: 20px;
    }

    
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- Navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-2" href="index.html"><img src="images/rororo.png" class="mr-1" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/lololo.png" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
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

          <!-- Order Details Section -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Deskripsi Kegunaan Dashboard Admin</p>
                  <p class="font-weight-500">
                    Dashboard ini membantu Anda memonitor penjualan, performa toko, dan pengelolaan produk dengan mudah dalam satu tempat.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Charts Section -->
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Presentase Keuangan</h4>
                  <canvas id="doughnutChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Presentase Total Penjualan</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Galeri Ikan -->
          <div class="row mt-4">
            <div class="col-12">
              <h4 class="section-title">Jenis Ikan yang Anda Jual</h4>
            </div>
            <div class="col-md-4">
              <div class="fish-card">
                <img src="images/fish1.jpg" alt="Ikan Tuna" class="fish-image">
                <div class="fish-card-body">
                  <p class="fish-title">Ikan Tuna</p>
                  <p class="fish-description">Ikan laut segar dengan kualitas premium.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fish-card">
                <img src="images/fish2.jpg" alt="Ikan Lele" class="fish-image">
                <div class="fish-card-body">
                  <p class="fish-title">Ikan Lele</p>
                  <p class="fish-description">Ikan air tawar yang segar dan bergizi.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fish-card">
                <img src="images/fish3.jpg" alt="Ikan Kakap" class="fish-image">
                <div class="fish-card-body">
                  <p class="fish-title">Ikan Kakap</p>
                  <p class="fish-description">Ikan laut berkualitas tinggi untuk berbagai masakan.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fish-card">
                <img src="images/fish4.jpg" alt="Ikan Bandeng" class="fish-image">
                <div class="fish-card-body">
                  <p class="fish-title">Ikan Bandeng</p>
                  <p class="fish-description">Pilihan sehat dengan rasa lembut dan gurih.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fish-card">
                <img src="images/fish5.jpg" alt="Ikan Salmon" class="fish-image">
                <div class="fish-card-body">
                  <p class="fish-title">Ikan Salmon</p>
                  <p class="fish-description">Kaya akan Omega-3, cocok untuk makanan sehat.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fish-card">
                <img src="images/fish6.jpg" alt="Ikan Nila" class="fish-image">
                <div class="fish-card-body">
                  <p class="fish-title">Ikan Nila</p>
                  <p class="fish-description">Ikan air tawar yang terkenal dengan dagingnya yang lezat dan kaya nutrisi. .</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fish-card">
                <img src="images/fish7.jpg" alt="Ikan Patin" class="fish-image">
                <div class="fish-card-body">
                  <p class="fish-title">Ikan Patin</p>
                  <p class="fish-description">Kaya akan asam lemak Omega-3 yang baik untuk kesehatan jantung.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script>
    // Chart Configuration
    var ctx1 = document.getElementById('doughnutChart').getContext('2d');
    var doughnutChart = new Chart(ctx1, {
      type: 'doughnut',
      data: {
        labels: ['Pink', 'Blue', 'Yellow'],
        datasets: [{
          data: [40, 30, 30],
          backgroundColor: ['#f64e60', '#3699ff', '#ffc700']
        }]
      }
    });

    var ctx2 = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: ['Pink', 'Blue', 'Yellow'],
        datasets: [{
          data: [45, 35, 20],
          backgroundColor: ['#f64e60', '#3699ff', '#ffc700']
        }]
      }
    });
  </script>
</body>

</html>
