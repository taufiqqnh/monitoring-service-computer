<?php
include '../../koneksi.php';

$id  = $_POST['id'];
$name  = $_POST['name'];
$username  = $_POST['username'];
$password = md5($_POST['password']);
$email  = $_POST['email'];
$level  = $_POST['level'];

$sql = mysqli_query($koneksi, "UPDATE admin SET name='$name', username='$username', password='$password', email='$email', level='$level' WHERE id='$id'") or die(mysqli_error($koneksi));

if ($sql) {
    // echo '<script>alert("Berhasil menyimpan data."); document.location="profile.php";</script>';
    header("location:profile.php?alert=berhasil");
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
