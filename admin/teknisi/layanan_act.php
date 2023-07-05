<?php
include '../../koneksi.php';
$kategori  = $_POST['kategori'];
$keterangan = $_POST['keterangan'];

$sql = mysqli_query($koneksi, "insert into jasa values (NULL,'$kategori','$keterangan')");

if ($sql) {
    echo '<script>alert("Berhasil menyimpan data."); document.location="layanan.php";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
