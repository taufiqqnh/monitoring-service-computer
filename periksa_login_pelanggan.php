<?php
session_start();
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

$login = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email='$email' AND password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    $_SESSION['id_pelanggan'] = $data['id_pelanggan'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['email'] = $data['email'];
    header('location:pelanggan/index.php');
} else {
    echo "<script>alert ('Gagal melakukan login');
	document.location='autentication.php' </script>";
}
