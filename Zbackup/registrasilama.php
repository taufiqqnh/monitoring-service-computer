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

  <title>Registrasi | DFN Computer</title>
  <link href="public/assets/img/home.png" rel="icon">
</head>

<body>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="public/assets/img/registrasi_icon.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-2">
                <h3>Sign Up DFN Computer</h3>
                <p class="mb-2">Silahkan Daftar akun terlebih dahulu</p>
              </div>
              <form action="registrasi_act.php" method="post">
                <div class="form-group first">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama">

                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password">

                </div>
                <div class="form-group">
                  <label for="nomorhp">Nomor HP</label>
                  <input type="text" class="form-control" id="hp" name="hp">

                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" required>

                </div>
                <div class="form-group">
                  <select class="form-control" name="jk" id="jk" aria-label="Default select example">
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group last mb-2">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <input type="hidden" class="form-control" id="status" name="status" value="Belum Member">
                <input type="submit" value="Register" class="btn btn-block btn-primary">

                <div class="d-flex mb-5 align-items-center">
                  <label class="control mb-0">
                    <span class="caption">Jika sudah memiliki akun silahkan</span>
                    <span class="caption"><a href="login_pelanggan.php" class="registrasi">Login</a></span>
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
  <script src="public/assets/js/main.js"></script>
  <script src="public/assets/js/owl.carousel.min.js"></script>
</body>

</html>