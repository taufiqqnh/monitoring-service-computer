<?php
include '../../koneksi.php';
$jenis  = $_POST['jenis'];
$kategori  = $_POST['kategori'];
$type = $_POST['type'];
$harga  = $_POST['harga'];

$sql = mysqli_query($koneksi, "insert into harga values (NULL,'$jenis','$kategori','$type','$harga')");

if ($sql) {
    // echo '<script>alert("Berhasil menyimpan data."); document.location="harga.php";</script>';
    header("location:harga.php?alert=sukses");
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
