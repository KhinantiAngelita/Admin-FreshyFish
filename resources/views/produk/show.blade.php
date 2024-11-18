<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <style>
    .product-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
      margin-bottom: 20px;
      cursor: pointer;
    }

    .product-card:hover {
      transform: scale(1.05);
    }

    .product-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .product-card-body {
      padding: 15px;
      text-align: center;
    }

    .product-card-body h5 {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .product-card-body p {
      font-size: 14px;
      margin-bottom: 5px;
      color: #555;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-2" href="{{ route('dashboard.index') }}">
          <img src="../../images/rororo.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard.index') }}">
          <img src="../../images/lololo.png" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="javascript:void(0)" id="logoutButton">
                <i class="ti-power-off text-primary"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
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
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <h4 class="card-title">List Produk Anda</h4>
                  <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm mr-3">Tambah Produk Baru</a>
                    <button id="exportExcel" class="btn btn-success btn-sm">Export to Excel</button>
                  </div>
                </div>
                <div class="row mt-4" id="productList"></div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
  <script>
    $(document).ready(function () {
      const token = localStorage.getItem('token');

      function loadProducts(callback) {
        $.ajax({
          url: 'https://freshyfishapi.ydns.eu/api/produk',
          type: 'GET',
          headers: { 'Authorization': 'Bearer ' + token },
          success: function (response) {
            let productList = '';

            if (Array.isArray(response)) {
              response.forEach(function (produk) {
                productList += `
                  <div class="col-md-4">
                    <div class="product-card" 
                      data-id="${produk.ID_produk}" 
                      data-toko="${produk.ID_toko}" 
                      data-name="${produk.fish_type}" 
                      data-weight="${produk.fish_weight}" 
                      data-price="${produk.fish_price}" 
                      data-habitat="${produk.habitat}" 
                      data-description="${produk.fish_description}" 
                      data-photo="https://freshyfishapi.ydns.eu/storage/fish_photos/${produk.fish_photo}">
                      <img src="https://freshyfishapi.ydns.eu/storage/fish_photos/${produk.fish_photo}" alt="Foto Produk">
                      <div class="product-card-body">
                        <h5>${produk.fish_type}</h5>
                        <p><strong>Habitat:</strong> ${produk.habitat}</p>
                        <p><strong>Berat:</strong> ${produk.fish_weight} kg</p>
                        <p><strong>Harga:</strong> Rp${produk.fish_price.toLocaleString()}</p>
                      </div>
                    </div>
                  </div>`;
              });
            } else {
              productList = '<div class="col-12"><p>Tidak ada data produk.</p></div>';
            }

            $('#productList').html(productList);

            $('.product-card').on('click', function () {
              const idProduk = $(this).data('id');
              const idToko = $(this).data('toko');
              const nama = $(this).data('name');
              const berat = $(this).data('weight');
              const harga = $(this).data('price');
              const habitat = $(this).data('habitat');
              const deskripsi = $(this).data('description');
              const photo = $(this).data('photo');

              Swal.fire({
                title: `<strong>${nama}</strong>`,
                html: `
                  <img src="${photo}" style="width: 100%; height: auto; margin-bottom: 15px;">
                  <p><strong>ID Produk:</strong> ${idProduk}</p>
                  <p><strong>ID Toko:</strong> ${idToko}</p>
                  <p><strong>Berat:</strong> ${berat} kg</p>
                  <p><strong>Harga:</strong> Rp${harga.toLocaleString()}</p>
                  <p><strong>Habitat:</strong> ${habitat}</p>
                  <p>${deskripsi}</p>
                  <div>
                    <a href="/produk/edit/${idProduk}" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" id="deleteProduct" data-id="${idProduk}">Delete</button>
                  </div>
                `,
                showConfirmButton: false,
              });

              $('#deleteProduct').on('click', function () {
                const productId = $(this).data('id');

                Swal.fire({
                  title: 'Apakah Anda yakin?',
                  text: 'Produk akan dihapus secara permanen.',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  confirmButtonText: 'Ya, hapus!',
                  cancelButtonText: 'Batal',
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                      url: `https://freshyfishapi.ydns.eu/api/produk/${productId}`,
                      type: 'DELETE',
                      headers: { 'Authorization': 'Bearer ' + token },
                      success: function () {
                        Swal.fire('Terhapus!', 'Produk telah dihapus.', 'success');
                        loadProducts();
                      },
                      error: function () {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus produk.', 'error');
                      },
                    });
                  }
                });
              });
            });

            if (callback) callback(response);
          },
          error: function () {
            alert('Gagal memuat produk.');
          },
        });
      }

      function exportToExcel(data) {
        if (!Array.isArray(data)) return;

        const formattedData = data.map((produk) => ({
          'ID Toko': produk.ID_toko,
          'ID Produk': produk.ID_produk,
          'Nama Ikan': produk.fish_type,
          'Harga Ikan': produk.fish_price,
          'Berat Ikan': produk.fish_weight,
          'Habitat': produk.habitat,
          'Deskripsi': produk.fish_description,
        }));

        const ws = XLSX.utils.json_to_sheet(formattedData);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Produk');
        XLSX.writeFile(wb, 'Produk.xlsx');
      }

      $('#exportExcel').on('click', function () {
        loadProducts(exportToExcel);
      });

      loadProducts();
    });
  </script>
</body>

</html>
