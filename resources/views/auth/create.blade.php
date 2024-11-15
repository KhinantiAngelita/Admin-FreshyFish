<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Buka Toko</title>
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <style>
    .placeholder-red::placeholder {
      color: red;
    }
    .border-red {
      border-color: red !important;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/Logo.png" alt="logo">
              </div>
              <h4>Mulai Membuka Toko</h4>
              <h6 class="font-weight-light">Masukan data toko anda</h6>
              <form class="pt-3" id="loginForm">
                <div class="form-group">
                    <p><b>Nama Toko</b></p>
                    <input type="text" class="form-control form-control-lg" id="nama_toko" name="nama_toko" placeholder="Nama Toko" required>
                </div>

                <div class="form-group">
                    <p><b>Alamat Toko</b></p>
                    <textarea class="form-control form-control-lg" id="alamat_toko" name="alamat_toko" placeholder="Alamat Toko" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <p><b>Kategori Toko</b></p>
                    <select class="form-control form-control-lg" id="kategori_toko" name="kategori_toko" required>
                        <option value="">Pilih Kategori Toko</option>
                        <option value="Ikan Laut">Ikan Laut</option>
                        <option value="Ikan Payau">Ikan Payau</option>
                        <option value="Ikan Tawar">Ikan Tawar</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Buka Toko</button>
                </div>
              </form>
              <p id="error-message" class="text-danger mt-2"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();

            var nama_toko = $('#nama_toko').val();
            var alamat_toko = $('#alamat_toko').val();
            var kategori_toko = $('#kategori_toko').val();

            const token = localStorage.getItem('token');

            if (!token) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Anda harus login terlebih dahulu.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '/auth/login';
                });
                return;
            }

            $.ajax({
                url: 'https://freshyfishapi.ydns.eu/api/toko',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Content-Type': 'application/json',
                    'Accept' : 'application/json'
                },
                data: JSON.stringify({
                    store_name: nama_toko,
                    store_address: alamat_toko,
                    product_category: kategori_toko,
                }),
                success: function(response) {
                    console.log("Response dari API:", response);

                    if (response.success) {
                        localStorage.setItem('ID_toko', response.user.ID_toko);

                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Toko berhasil dibuka',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/dashboard';
                            }
                        });
                    } else {
                        $('#error-message').text(response.message);
                    }
                },
                error: function(xhr) {
                    console.log("Error:", xhr);
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Terjadi kesalahan. Silakan coba lagi.';
                    $('#error-message').text(errorMessage);
                }
            });
        });
    });
</script>


</body>
</html>
