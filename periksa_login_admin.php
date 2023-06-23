<?php
session_start();
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == "Teknisi") {
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = 'Teknisi';
        header('location:admin/teknisi/index.php');
    } else 
    if ($data['level'] == "Owner") {
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = 'Owner';
        header('location:admin/owner/index.php');
    }
} else {
    echo "<script>alert ('Gagal melakukan login');
	document.location='admin.php' </script>";
}
