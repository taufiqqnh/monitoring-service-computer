<?php
include '../../koneksi.php';

$id  = $_POST['id_jasa'];
$kategori  = $_POST['kategori'];
$keterangan = $_POST['keterangan'];
$sql = mysqli_query($koneksi, "UPDATE jasa SET kategori='$kategori', keterangan='$keterangan' WHERE id_jasa='$id'") or die(mysqli_error($koneksi));

if ($sql) {
    echo '<script>alert("Berhasil menyimpan data."); document.location="layanan.php";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
