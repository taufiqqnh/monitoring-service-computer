<?php
include '../../koneksi.php';
$name  = $_POST['name'];
$username  = $_POST['username'];
$email  = $_POST['email'];
$level = $_POST['level'];
$password  = md5($_POST['password']);

$cek_email = mysqli_query($koneksi, "select * from admin where email='$email'");
if (mysqli_num_rows($cek_email) > 0) {
    echo '<script>alert("Email Sudah Terdaftar."); document.location="teknisi.php";</script>';
} else {
    mysqli_query($koneksi, "insert into admin values (NULL,'$name','$username','$password','$email','$password')");
    echo '<script>alert("Berhasil Mendaftar."); document.location="teknisi.php";</script>';
}
