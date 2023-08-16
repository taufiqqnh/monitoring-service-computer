<?php
include '../../koneksi.php';
$id_pelanggan  = $_POST['id_pelanggan'];
$kategori = $_POST['kategori'];
$type = $_POST['type'];
$keluhan = $_POST['keluhan'];
$progres = $_POST['progres'];


$sql = mysqli_query($koneksi, "INSERT INTO service (id_pelanggan, kategori, type, keluhan, progres) VALUES('$id_pelanggan','$kategori','$type','$keluhan','$progres')") or die(mysqli_error($koneksi));
// header("location:index.php#service");
if ($sql) {
    // echo '<script>alert("Berhasil menyimpan data."); document.location="harga.php";</script>';
    header("location:service.php?alert=sukses");
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
// $sql = mysqli_query($koneksi, "SELECT * FROM pelanggan");
$data = mysqli_fetch_assoc($sql);
$data['id_pelanggan'] = $data['id_pelanggan'];
