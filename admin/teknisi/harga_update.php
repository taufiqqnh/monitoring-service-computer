<?php
include '../../koneksi.php';

$id  = $_POST['id_harga'];
$jenis  = $_POST['jenis'];
$jenis  = $_POST['jenis'];
$kategori  = $_POST['kategori'];
$type = $_POST['type'];
$harga  = $_POST['harga'];
$sql = mysqli_query($koneksi, "UPDATE harga SET jenis='$jenis', kategori='$kategori', type='$type', harga='$harga' WHERE id_harga='$id'") or die(mysqli_error($koneksi));

if ($sql) {
    echo '<script>alert("Berhasil menyimpan data."); document.location="harga.php";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
