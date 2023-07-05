<?php
include '../../koneksi.php';

$noserv  = $_POST['no_service'];
$progres  = $_POST['progres'];
$sql = mysqli_query($koneksi, "UPDATE service SET 
progres='$progres' 
WHERE no_service='$noserv'") or die(mysqli_error($koneksi));

if ($sql) {
    echo '<script>alert("Berhasil menyimpan data."); document.location="transaksi_service.php";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
