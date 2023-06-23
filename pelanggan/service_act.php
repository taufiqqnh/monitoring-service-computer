<?php
include '../koneksi.php';
$id_pelanggan  = $_POST['id_pelanggan'];
$kategori = $_POST['kategori'];
$type = $_POST['type'];
$keluhan = $_POST['keluhan'];
$progres = $_POST['progres'];


$sql = mysqli_query($koneksi, "INSERT INTO service (id_pelanggan, kategori, type, keluhan, progres) VALUES('$id_pelanggan','$kategori','$type','$keluhan','$progres')") or die(mysqli_error($koneksi));
header("location:index.php#service");
$data = mysqli_fetch_assoc($sql);
$_SESSION['id_pelanggan'] = $data['id_pelanggan'];
