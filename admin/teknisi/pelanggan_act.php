<?php
include '../../koneksi.php';
$nama  = $_POST['nama'];
$email = $_POST['email'];
$jk = $_POST['jk'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];
$password = md5($_POST['password']);

$cek_email = mysqli_query($koneksi, "select * from pelanggan where email='$email'");
if (mysqli_num_rows($cek_email) > 0) {
    echo '<script>alert("Email Sudah Terdaftar."); document.location="pelanggan.php";</script>';
} else {
    mysqli_query($koneksi, "insert into pelanggan values (NULL,'$nama','$password','$hp','$email','$jk','$alamat', '$status')");
    header("location:pelanggan.php?alert=sukses");
}
