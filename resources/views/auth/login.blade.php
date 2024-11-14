<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
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
              <h4>Hallo! Selamat Datang</h4>
              <h6 class="font-weight-light">Sign in untuk melanjutkan</h6>
              <form class="pt-3" id="loginForm">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
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
  
  <script>
    $(document).ready(function() {
    // Event listener untuk form submission
    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); // Mencegah reload halaman

        // Ambil nilai email dan password dari input form
        const email = $('#email').val().trim();
        const password = $('#password').val().trim();
        let isValid = true;

        // Validasi inputan email dan password
        if (!email) {
        $('#email').addClass('border-red placeholder-red').attr('placeholder', 'Email diperlukan');
        isValid = false;
        }

        if (!password) {
        $('#password').addClass('border-red placeholder-red').attr('placeholder', 'Password diperlukan');
        isValid = false;
        }

        // Jika validasi gagal, hentikan proses
        if (!isValid) return;

        // Kirimkan data ke API menggunakan AJAX
        $.ajax({
        url: 'https://freshyfishapi.ydns.eu/api/auth/login', // URL dengan CORS proxy
        method: 'POST',
        data: JSON.stringify({ email: email, password: password }),
        contentType: 'application/json',
        success: function(response) {
            console.log("Response dari API:", response);
            if (response.token) {
              window.location.href = '/dashboard';  // Arahkan ke halaman dashboard
            } else {
              $('#error-message').text('Email atau password salah');
            }
        },
        error: function(xhr) {
            console.log("Error:", xhr);
            $('#error-message').text('Terjadi kesalahan. Silakan coba lagi.');
        }
        });
    });
    });

  </script>
</body>
</html>
