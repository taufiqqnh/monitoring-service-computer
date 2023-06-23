<?php
include '../../koneksi.php';
$kategori  = $_POST['kategori'];
$keterangan = $_POST['keterangan'];
$harga  = $_POST['harga'];

$sql = mysqli_query($koneksi, "insert into jasa values (NULL,'$kategori','$keterangan','$harga')");

if ($sql) {
    echo '<script>alert("Berhasil menyimpan data."); document.location="harga.php";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
