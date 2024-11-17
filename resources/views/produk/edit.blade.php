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
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
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
      <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Produk dengan ID {{ $id }}</h4>
                                <p class="card-description">
                                    Edit data produk anda
                                </p>
                                <form class="forms-sample" id="productForm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="fish_photo">Foto Produk</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fish_photo" accept="image/*" required>
                                            <label class="custom-file-label" for="fish_photo">Pilih Foto</label>
                                        </div>
                                        <small class="form-text text-muted">Unggah foto produk dengan format JPG, PNG, atau JPEG, max 2 mb.</small>
                                        <div class="mt-3">
                                            <img id="photoPreview" src="" alt="Preview Foto" class="img-thumbnail" style="display: none; max-height: 200px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="fish_type">Nama Ikan</label>
                                        <input type="text" class="form-control" id="fish_type" placeholder="Nama Ikan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fish_weight">Berat Ikan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="fish_weight" placeholder="Berat Ikan" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fish_price">Harga Ikan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="fish_price" placeholder="Harga Ikan" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Rp / kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="habitat">Kategori Ikan</label>
                                        <select class="form-control" id="habitat" required>
                                            <option value="Ikan Laut">Ikan Laut</option>
                                            <option value="Ikan Tawar">Ikan Tawar</option>
                                            <option value="Ikan Payau">Ikan Payau</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fish_description">Deskripsi Ikan</label>
                                        <textarea class="form-control" id="fish_description" rows="4" required></textarea>
                                    </div>
                                    <button type="button" id="saveChangesBtn" class="btn btn-primary">Perbarui Data</button>
                                    <a href="{{ route('produk.show') }}" class="btn btn-inverse-dark btn-fw">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->

            <!-- Modal -->
            <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSuccessLabel">Produk Berhasil Disimpan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Produk telah berhasil disimpan. Anda akan diarahkan ke halaman produk dalam beberapa detik.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">
    $(document).ready(function () {
        const token = localStorage.getItem('token');
        const ID_produk = window.location.pathname.split('/').pop();

        // Fetch product data
        $.ajax({
            url: `https://freshyfishapi.ydns.eu/api/produk/${ID_produk}`,
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json'
            },
            success: function (data) {
                if (data) {
                    $('#fish_type').val(data.fish_type || '');
                    $('#fish_price').val(data.fish_price || '');
                    $('#fish_weight').val(data.fish_weight || '');
                    $('#fish_description').val(data.fish_description || '');

                    // Display the photo preview with the correct path
                    if (data.fish_photo) {
                        $('#photoPreview').attr('src', `https://freshyfishapi.ydns.eu/storage/fish_photos/${data.fish_photo}`).show();
                    }
                }
            },
            error: function () {
                Swal.fire('Gagal!', 'Terjadi kesalahan saat mengambil data produk.', 'error');
            }
        });

        // Display photo preview when a new file is selected
        $('#fish_photo').on('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#photoPreview').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });

        // Save product changes
        $('#saveChangesBtn').on('click', function () {
            const formData = new FormData();
            const fileInput = $('#fish_photo')[0].files[0];
            if (fileInput) {
                formData.append('fish_photo', fileInput);
            }

            formData.append('fish_type', $('#fish_type').val());
            formData.append('fish_weight', $('#fish_weight').val());
            formData.append('fish_price', $('#fish_price').val());
            formData.append('habitat', $('#habitat').val());
            formData.append('fish_description', $('#fish_description').val());

            $.ajax({
                url: `https://freshyfishapi.ydns.eu/api/produk/${ID_produk}`,
                type: 'POST',  // Change this to 'PUT' if required by your backend
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                },
                success: function () {
                    Swal.fire('Berhasil!', 'Data produk berhasil diperbarui.', 'success');
                    setTimeout(() => window.location.href = "{{ route('produk.show') }}", 2000);
                },
                error: function () {
                    Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan perubahan.', 'error');
                }
            });
        });
    });
</script>

</body>

</html>
