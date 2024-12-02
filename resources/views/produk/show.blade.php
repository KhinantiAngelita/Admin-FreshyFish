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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
          <li class="nav-item @if(request()->is('produk*')) active @endif">
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
                    <h4 class="card-title">
                        <i class="fas fa-box-open"></i> List Produk Anda
                    </h4>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm" style="margin-right: 15px;">
                            <i class="fas fa-plus-circle"></i> Tambah Produk Baru
                        </a>
                        <button id="exportExcelProduk" class="btn btn-success btn-sm" style="margin-right: 15px;">
                            <i class="fas fa-file-excel"></i> Export to Excel
                        </button>
                        <button id="exportPdfProduk" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>


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
                  customClass: {
                        popup: 'custom-swal-popup'
                    }
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                      url: `https://freshyfishapi.ydns.eu/api/produk/${productId}`,
                      type: 'DELETE',
                      headers: { 'Authorization': 'Bearer ' + token },
                      success: function () {
                        Swal.fire({
                            title: 'Terhapus!',
                            text: 'Produk telah dihapus.',
                            icon: 'success',
                            customClass: {
                            popup: 'custom-swal-popup', // Tambahkan kustomisasi popup
                            },
                        });
                        loadProducts(); // Memuat ulang produk setelah penghapusan berhasil
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
          Habitat: produk.habitat,
          Deskripsi: produk.fish_description,
        }));

        const ws = XLSX.utils.json_to_sheet(formattedData);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Produk');
        XLSX.writeFile(wb, 'Produk.xlsx');
      }

      function exportToPdf(data) {
        if (!Array.isArray(data)) return;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const tableColumn = [
          'No.',
          'ID Toko',
          'ID Produk',
          'Nama Ikan',
          'Harga Ikan',
          'Berat Ikan (kg)',
          'Habitat',
          'Deskripsi',
        ];

        const tableRows = data.map((produk, index) => [
          index + 1, // Nomor
          produk.ID_toko, // ID Toko
          produk.ID_produk, // ID Produk
          produk.fish_type, // Nama Ikan
          `Rp${produk.fish_price.toLocaleString()}`, // Harga Ikan
          produk.fish_weight, // Berat Ikan
          produk.habitat, // Habitat
          produk.fish_description, // Deskripsi
        ]);

        // Header Judul (Di Tengah)
        doc.setFontSize(16);
        doc.text('Daftar Produk', 105, 15, { align: 'center' }); // Posisi tengah horizontal

        // Menambahkan Tabel dengan AutoTable
        doc.autoTable({
          startY: 25, // Posisi awal tabel
          head: [tableColumn], // Kolom header
          body: tableRows, // Data tabel
          theme: 'grid', // Tema tabel (pilihan: 'striped', 'grid', 'plain')
          styles: {
            fontSize: 10, // Ukuran font tabel
            halign: 'left', // Align isi tabel
          },
          headStyles: {
            fillColor: [0, 150, 200], // Warna background header (#0096C8)
            textColor: [255, 255, 255], // Warna teks header (putih)
          },
          alternateRowStyles: {
            fillColor: [240, 240, 240], // Warna baris alternatif (abu muda)
          },
        });

        // Simpan File PDF
        doc.save('Daftar_Produk.pdf');
      }

      $('#exportExcelProduk').on('click', function () {
        loadProducts(exportToExcel);
      });

      $('#exportPdfProduk').on('click', function () {
        loadProducts(exportToPdf);
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

      loadProducts();
    });
  </script>


</body>

</html>
