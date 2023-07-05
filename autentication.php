<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Register Pelanggan</title>
    <link href="public/assets/img/home.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/assets/css/styleautentication.css">
</head>

<body style="background-image: url('public/assets/img/bg.jpeg');">
    <div class="form">
        <ul class="tab-group">
            <li class="tab active"><a href="#login" style="border-radius: 15px!important;margin-left:8px;">Log In</a></li>
            <li class="tab"><a href="#signup" style="border-radius: 15px!important;margin-right:8x;">Sign Up</a></li>
        </ul>
        <div class="tab-content">

            <div id="login">
                <h1>Login</h1>
                <form action="periksa_login_pelanggan.php" method="POST">
                    <div class="field-wrap">
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off" required placeholder="Email" />
                    </div>
                    <div class="field-wrap">
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password" />
                    </div>
                    <button class="button button-block">Login</button>
                </form>
            </div>

            <div id="signup">
                <h1>Register</h1>
                <form action="registrasi_act.php" method="post">
                    <div class="top-row">
                        <div class="field-wrap">
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required placeholder="Nama" />
                        </div>
                        <div class="field-wrap">
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Password" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$" title="Harus 8 Karakter Password!!" />
                        </div>
                    </div>
                    <div class="top-row">
                        <div class="field-wrap">
                            <input type="text" class="form-control" id="hp" name="hp" autocomplete="off" required placeholder="No Hp" />
                        </div>
                        <div class="field-wrap">
                            <select class="form-control" name="jk" id="jk" required>
                                <option value="" selected>Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="field-wrap">
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off" required placeholder="Email Address" />
                    </div>
                    <div class="field-wrap">
                        <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required placeholder="Alamat" />
                    </div>
                    <input type="hidden" class="form-control" id="status" name="status" value="Belum Member">

                    <button type="submit" class="button button-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/assets/js/mainautentication.js"></script>
</body>

</html>