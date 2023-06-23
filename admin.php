<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="public/assets/img/home.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/assets/css/styleautentication.css">
</head>

<body style="background-image: url('public/assets/img/bg.jpeg');">
    <div class="form">
        <div id="login">
            <h1>Login Admin</h1>
            <form action="periksa_login_admin.php" method="POST">
                <div class="field-wrap">
                    <input type="text" class="form-control" id="username" name="username" required placeholder="Username" />
                </div>
                <div class="field-wrap">
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Password" />
                </div>
                <button class="button button-block">Login</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/assets/js/mainautentication.js"></script>
</body>

</html>