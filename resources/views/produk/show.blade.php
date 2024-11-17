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
        <a class="navbar-brand brand-logo mr-2" href="index.html"><img src="images/romawei.png" class="mr-1" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/loioy.png" alt="logo" /></a>
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
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <!-- chat tab ends -->
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
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">List Produk Anda</h4>
                    <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm">Tambah Produk Baru</a>
                  </div>
                  <p class="card-description"></p>
                  <div class="table-responsive">
                    <div class="table-scroll" style="overflow-x: auto;">
                      <table class="table table-striped">
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
        <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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

  <script type="text/javascript">
    $(document).ready(function() {
      // Ambil token dari localStorage
      const token = localStorage.getItem('token');
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
      function loadProducts() {
        $.ajax({
          url: 'https://freshyfishapi.ydns.eu/api/produk', // URL API untuk mengambil data produk
          type: 'GET',
          headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
          },
          success: function(response) {
            let productList = '';
            console.log(response);

            // Validasi respons data
            if (response && Array.isArray(response)) { // Pastikan response adalah array
              response.forEach(function(produk) {
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
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
            Swal.fire(
              'Gagal!',
              'Terjadi kesalahan saat memuat produk. Silakan coba lagi.',
              'error'
            );
          }
        });
      }

      //Pengalihan ke pages edit
      $(document).on('click', '.editProduct', function() {
        const ID_produk = $(this).data('id');
        // Mengarahkan ke halaman edit produk berdasarkan ID
        window.location.href = `/produk/edit/${ID_produk}`;
      });


      // Muat produk ketika halaman selesai dimuat
      loadProducts();

      // Fungsi untuk menghapus produk
      $(document).on('click', '.deleteProduct', function() {
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
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: `https://freshyfishapi.ydns.eu/api/produk/${ID_produk}`,
              type: 'DELETE',
              headers: {
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json'
              },
              success: function(response) {
                console.log('Produk berhasil dihapus:', response);
                Swal.fire(
                  'Terhapus!',
                  'Produk berhasil dihapus.',
                  'success'
                );
                loadProducts(); // Refresh data produk setelah penghapusan
              },
              error: function(xhr, status, error) {
                console.error('Error:', error);
                Swal.fire(
                  'Gagal!',
                  'Terjadi kesalahan saat menghapus produk. Silakan coba lagi.',
                  'error'
                );
              }
            });
          }
        });
      });

      // Fungsi untuk logout
      $('#logoutButton').on('click', function() {
        $.ajax({
          url: 'https://freshyfishapi.ydns.eu/api/logout',
          type: 'POST',
          headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
          },
          success: function(response) {
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
          error: function(xhr, status, error) {
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
    });
  </script>



</body>

</html>