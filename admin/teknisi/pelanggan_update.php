<?php
include '../../koneksi.php';

$id  = $_POST['id_pelanggan'];
$nama  = $_POST['nama'];
$email  = $_POST['email'];
$jk = $_POST['jk'];
$hp  = $_POST['hp'];
$alamat  = $_POST['alamat'];
$status  = $_POST['status'];
$password = md5($_POST['password']);
$sql = mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama', password='$password', hp='$hp', email='$email', jk='$jk', alamat='$alamat', status='$status' WHERE id_pelanggan='$id'") or die(mysqli_error($koneksi));

if ($sql) {
    echo '<script>alert("Berhasil menyimpan data."); document.location="pelanggan.php";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
