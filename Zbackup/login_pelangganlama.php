<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="public/assets/fonts/icomoon/style.css">

  <link rel="stylesheet" href="public/assets/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="public/assets/css/stylelogin.css">

  <title>Login | DFN Computer</title>
  <link href="public/assets/img/home.png" rel="icon">
</head>

<body>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="public/assets/img/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>Sign In DFN Computer</h3>
                <p class="mb-4">Silahkan Login menggunakan akun yang sudah terdaftar</p>
              </div>
              <form action="periksa_login_pelanggan.php" method="POST">
                <div class="form-group first">
                  <label for="">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required="required" autocomplete="off">

                </div>
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required="required" autocomplete="off">

                </div>

                <input type="submit" value="Log In" class="btn btn-block btn-primary">

                <div class="d-flex mb-5 align-items-center">
                  <label class="control mb-0">
                    <span class="caption">Jika belum memiliki akun silahkan</span>
                    <span class="caption"><a href="registrasi.php" class="registrasi">Registrasi</a></span>
                  </label>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="public/assets/js/jquery-3.3.1.min.js"></script>
  <script src="public/assets/js/popper.min.js"></script>
  <script src="public/assets/js/bootstrap.min.js"></script>
  <script src="public/assets/js/mainlogin.js"></script>
</body>

</html>