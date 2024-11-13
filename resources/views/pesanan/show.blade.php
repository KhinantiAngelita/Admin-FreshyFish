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
            <a class="navbar-brand brand-logo mr-2" href="index.html"><img src="images/romawei.png" class="mr-1" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/loioy.png" alt="logo"/></a>
        </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
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
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face28.jpg" alt="profile"/>
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
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
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
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Toko</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk.show') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pesanan.show') }}">
                        <i class="icon-grid menu-icon"></i>
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
                    <div class="card" style="max-width: 100%; overflow: hidden;">
                        <div class="card-body">
                            <h4 class="card-title">List Pesanan</h4>
                            <p class="card-description">
                            </p>
                            <div class="table-responsive">
                                <!-- Tambahkan overflow-x pada div ini -->
                                <div class="table-scroll" style="overflow-x: auto;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>id Pesanan</th>
                                                <th>id User</th>
                                                <th>id Keranjang</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Total Harga</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="pesanan-list">
                                            <!-- Data Pesanan Dummy -->
                                            <tr id="pesanan-101">
                                                <td>1</td>
                                                <td>101</td>
                                                <td class="py-1">11</td>
                                                <td>2024-11-12</td>
                                                <td>BCA</td>
                                                <td>$245.30</td>
                                                <td>
                                                    <span class="status-text" id="status-101">Pending</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm" onclick="editPesanan(101)">Edit</button>
                                                    <button class="btn btn-danger btn-sm" onclick="deletePesanan(101)">Delete</button>
                                                </td>
                                            </tr>
                                            <tr id="pesanan-102">
                                                <td>2</td>
                                                <td>102</td>
                                                <td class="py-1">22</td>
                                                <td>2024-11-12</td>
                                                <td>COD</td>
                                                <td>$300.00</td>
                                                <td>
                                                    <span class="status-text" id="status-102">Completed</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm" onclick="editPesanan(102)">Edit</button>
                                                    <button class="btn btn-danger btn-sm" onclick="deletePesanan(102)">Delete</button>
                                                </td>
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



      <!-- Modal Edit Pesanan -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit Pesanan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form id="editForm">
                          <div class="form-group">
                              <label for="status">Status</label>
                              <select id="status" class="form-control">
                                  <option value="pending">Pending</option>
                                  <option value="completed">Completed</option>
                                  <option value="canceled">Canceled</option>
                              </select>
                          </div>
                          <input type="hidden" id="pesanan_id" />
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="saveEditPesanan()">Save changes</button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal Delete Confirmation -->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      Apakah Anda yakin ingin menghapus pesanan ini?
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <button type="button" class="btn btn-danger" onclick="deletePesananConfirm()">Hapus</button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal Edit Pesanan -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit Pesanan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form id="editForm">
                          <div class="form-group">
                              <label for="status">Status Pesanan</label>
                              <input type="text" id="status" class="form-control" readonly />
                          </div>
                          <input type="hidden" id="pesanan_id" />
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="saveEditPesanan()">Save changes</button>
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
      </div>
    </div>
  </div>

  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>

  <script>
    // Fungsi untuk mengedit pesanan
    function editPesanan(id) {
        // Mengambil status dari dropdown status pada baris pesanan tertentu
        var status = $('#pesanan-' + id).find('.status-select').val();
        
        // Set status pada modal input untuk diedit
        $('#status').val(status);
        
        // Set ID pesanan pada hidden input untuk menyimpan ID pesanan
        $('#pesanan_id').val(id);
        
        // Menampilkan modal untuk edit pesanan
        $('#editModal').modal('show');
    }

    // Fungsi untuk menyimpan perubahan status pesanan
    function saveEditPesanan() {
        var pesananId = $('#pesanan_id').val(); // Ambil ID pesanan
        var status = $('#status').val();  // Ambil status baru dari input text
        
        // Kirimkan data menggunakan AJAX
        $.ajax({
            url: 'https://freshyfishapi.ydns.eu/pesanan/' + pesananId, // URL API untuk mengedit pesanan
            type: 'PUT',  // Menggunakan method PUT untuk update data
            data: {
                status: status, // Kirimkan status baru
                _token: '{{ csrf_token() }}', // Kirimkan token CSRF untuk keamanan
            },
            success: function(response) {
                // Update status pesanan di tampilan
                $('#pesanan-' + pesananId).find('.status-select').val(status);
                // Tutup modal setelah penyimpanan
                $('#editModal').modal('hide');
                
                // Tampilkan notifikasi sukses
                alert('Pesanan berhasil diperbarui');
            },
            error: function(xhr) {
                // Tampilkan notifikasi jika terjadi error
                alert('Gagal memperbarui pesanan');
            }
        });
    }

    // Fungsi untuk menghapus pesanan
    function deletePesanan(id) {
        // Set ID pesanan pada hidden input
        $('#pesanan_id').val(id);
        
        // Tampilkan modal konfirmasi untuk hapus pesanan
        $('#deleteModal').modal('show');
    }

    // Fungsi untuk mengonfirmasi penghapusan pesanan
    function deletePesananConfirm() {
        var pesananId = $('#pesanan_id').val();  // Ambil ID pesanan

        // Kirimkan request AJAX untuk menghapus pesanan
        $.ajax({
        url: 'https://cors-anywhere.herokuapp.com/https://freshyfishapi.ydns.eu/pesanan/' + pesananId, // Menambahkan CORS proxy
        type: 'PUT',
        data: {
            status: status,
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            // Update status pesanan dan tutup modal
            $('#pesanan-' + pesananId).find('.status-select').val(status);
            $('#editModal').modal('hide');
            alert('Pesanan berhasil diperbarui');
        },
        error: function() {
            alert('Gagal memperbarui pesanan');
        }
        });
    }
</script>


</body>

</html>
