<?php
include 'koneksi.php';
$nama  = $_POST['nama'];
$password = md5($_POST['password']);
$hp = $_POST['hp'];
$email = $_POST['email'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];

$cek_email = mysqli_query($koneksi, "select * from pelanggan where email='$email'");
if (mysqli_num_rows($cek_email) > 0) {
	header("location:daftar.php?alert=duplikat");
} else {
	mysqli_query($koneksi, "insert into pelanggan values (NULL,'$nama','$password','$hp','$email','$jk','$alamat')");
	header("location:index.php?alert=terdaftar");
}
