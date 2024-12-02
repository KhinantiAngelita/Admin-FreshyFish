<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard Admin</title>

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.materialdesignicons.com/7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.css">

  <!-- External Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Custom Style -->
  <style>
    .card {
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-title {
      font-weight: bold;
      color: #4CAF50;
    }

    .chart-container {
      overflow-x: auto;
      max-width: 100%;
    }

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

    .menu-title {
      font-size: 1rem;
      font-weight: 600;
    }

    .dashboard-banner {
      height: auto;
      max-height: 40vh;
      object-fit: cover;
    }

    .stats-card {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem;
      background-color: #f8f9fa;
      border-radius: 10px;
      margin-bottom: 1rem;
    }

    .stats-icon {
      font-size: 2rem;
      color: #4CAF50;
    }

    .stats-content {
      text-align: right;
    }

    .stats-content h4 {
      margin: 0;
      font-size: 1.25rem;
      color: #333;
    }

    .stats-content p {
      margin: 0;
      color: #777;
    }

    .container-fluid.page-body-wrapper {
      margin-top: 20px;
    }

  </style>
</head>

<body>
    <div class="container-scroller">
       <!-- Navbar -->
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
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('toko.index') }}">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Toko</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('produk.show') }}">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Produk</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('pesanan.show') }}">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Pesanan</span>
                  </a>
                </li>
              </ul>
            </nav>

          <div class="main-panel">
            <div class="content-wrapper">
              <!-- Welcome Message -->
              <div class="row mb-4">
                <div class="col-md-12">
                  <h3 class="font-weight-bold" id="welcomeMessage">Selamat Datang Admin!</h3>
                </div>
              </div>

              <!-- Banner -->
              <div class="row">
                <div class="col-lg-12">
                  <img src="../../images/banner.png" alt="banner" class="img-fluid w-100 dashboard-banner" />
                </div>
              </div>

              <!-- Total Stats and Doughnut Charts -->
              <div class="row mt-4">
                <!-- Total Profit -->
                <div class="col-lg-6 mb-4">
                    <div class="stats-card">
                      <i class="fas fa-dollar-sign stats-icon" style="color: #0096C8;"></i>
                      <div class="stats-content">
                        <h4 id="totalProfit">Rp 0</h4>
                        <p>Total Keuntungan</p>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Grafik Total Keuntungan</h4>
                        <div class="chart-container">
                          <canvas id="profitChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Total Products Sold -->
                  <div class="col-lg-6 mb-4">
                    <div class="stats-card">
                      <i class="fas fa-box stats-icon" style="color: #0096C8;"></i>
                      <div class="stats-content">
                        <h4 id="totalProducts">0</h4>
                        <p>Total Produk Terjual</p>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Grafik Total Produk Terjual</h4>
                        <div class="chart-container">
                          <canvas id="productsSoldChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>

              <!-- Order History Chart -->
              <div class="row mt-4">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Grafik Histori Pesanan</h4>
                      <div
                        class="chart-container"
                        style="position: relative; height:400px; overflow-x: auto; white-space: nowrap;"
                      >
                        <div style="min-width: 800px;">
                          <canvas id="historyChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>

  <!-- Script -->
  <script>
    $(document).ready(function () {
      const apiBaseUrl = 'https://freshyfishapi.ydns.eu/api';
      const token = localStorage.getItem('token');

      if (!token) {
        alert('User tidak terautentikasi!');
        return;
      }

      // Fungsi umum untuk mengambil data dari API
      function fetchData(endpoint, callback) {
        $.ajax({
          url: `${apiBaseUrl}/${endpoint}`,
          type: 'GET',
          headers: { 'Authorization': 'Bearer ' + token },
          success: callback,
          error: function () {
            alert(`Gagal memuat data dari endpoint: ${endpoint}`);
          },
        });
      }

      // Fungsi untuk menampilkan pesan selamat datang
      function getUserData() {
        fetchData('auth/me', function (response) {
            console.log(response.data); // Debugging untuk memeriksa struktur data
            const name = response.data.name || 'Admin';
            $('#welcomeMessage').text(`Selamat Datang, ${name}!`);
        });
        }


      // Fungsi untuk membuat bar chart
      function generateBarChart(ctxId, labels, data, backgroundColors) {
        const ctx = document.getElementById(ctxId).getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              data: data,
              backgroundColor: backgroundColors,
              borderColor: '#000',
              borderWidth: 1,
            }],
          },
          options: {
            responsive: true,
            scales: {
              y: { beginAtZero: true },
            },
            plugins: {
              legend: { display: false },
            },
          },
        });
      }

      // Mengambil data total profit dan menampilkan bar chart
      function getTotalProfit() {
        fetchData('pesanan/total-profit', function (response) {
          const totalProfit = response.total_profit || 0;
          $('#totalProfit').text(`Rp ${totalProfit.toLocaleString()}`);
          generateBarChart(
            'profitChart',
            ['Keuntungan'],
            [totalProfit],
            ['#FFB327']
          );
        });
      }

      // Mengambil data total produk terjual dan menampilkan bar chart
      function getTotalProductsSold() {
        fetchData('pesanan/total-products-sold', function (response) {
          const totalProducts = response.total_products_sold || 0;
          $('#totalProducts').text(totalProducts);
          generateBarChart(
            'productsSoldChart',
            ['Produk Terjual'],
            [totalProducts],
            ['#0096C8']
          );
        });
      }

      // Mengambil data histori pesanan dan menampilkan chart
      function getPesananForChart() {
        fetchData('pesanan/histori', function (response) {
          console.log(response); // Debugging untuk memeriksa data API
          if (response.orders && response.orders.length > 0) {
            const labels = response.orders.map(order => order.order_date || 'Unknown');
            const profits = response.orders.map(order => parseFloat(order.total_price) || 0);

            generateHistoryChart(labels, profits);
          } else {
            alert('Tidak ada data pesanan untuk ditampilkan.');
          }
        });
      }

      // Fungsi untuk menampilkan chart histori pesanan
      function generateHistoryChart(labels, profits) {
        const ctx = document.getElementById('historyChart').getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Total Keuntungan (Rp)',
              data: profits,
              backgroundColor: '#FFB327',
              borderColor: '#FFC300',
              borderWidth: 1,
            }],
          },
          options: {
            responsive: true,
            scales: {
              y: { beginAtZero: true },
            },
          },
        });
      }

      $('#logoutButton').on('click', function() {
                const token = localStorage.getItem('token');  // Pastikan token didefinisikan
                if (!token) {
                    alert('Anda tidak terautentikasi!');
                    return;
                }
                
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
            
      // Panggil fungsi untuk memuat data
      getUserData();
      getTotalProfit();
      getTotalProductsSold();
      getPesananForChart();
    });
  </script>




</body>

</html>
