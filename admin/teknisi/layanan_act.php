<?php
include '../../koneksi.php';
$kategori  = $_POST['kategori'];
$keterangan = $_POST['keterangan'];

$sql = mysqli_query($koneksi, "insert into jasa values (NULL,'$kategori','$keterangan')");

if ($sql) {
    header("location:layanan.php?alert=sukses");
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
