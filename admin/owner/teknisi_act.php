<?php
include '../../koneksi.php';
// $id = $_POST['id'];
$name  = $_POST['name'];
$username  = $_POST['username'];
$email  = $_POST['email'];
$level = $_POST['level'];
$password  = md5($_POST['password']);

$cek_email = mysqli_query($koneksi, "select * from admin where email='$email'");
if (mysqli_num_rows($cek_email) > 0) {
    echo '<script>alert("Email Sudah Terdaftar."); document.location="teknisi.php";</script>';
} else {
    mysqli_query($koneksi, "insert into admin values ('$id', '$name','$username','$password','$email','$level')");
    echo '<script>alert("Berhasil Mendaftar."); document.location="teknisi.php";</script>';
}
