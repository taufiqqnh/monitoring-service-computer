<?php
include '../../koneksi.php';
session_start();

$noserv  = $_POST['no_service'];
$kategori  = $_POST['kategori'];
$type = $_POST['type'];
$keluhan  = $_POST['keluhan'];
$progres  = $_POST['progres'];
$keterangan  = $_POST['keterangan'];
$id =  $_SESSION['id'];
$sql = mysqli_query($koneksi, "UPDATE service SET 
kategori='$kategori', 
type='$type', 
keluhan='$keluhan', 
progres='$progres',
keterangan='$keterangan',
id_admin = '$id'
WHERE no_service='$noserv'") or die(mysqli_error($koneksi));

if ($sql) {
    echo '<script>alert("Berhasil menyimpan data."); document.location="service.php";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
