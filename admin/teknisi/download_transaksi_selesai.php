<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />


<?php
include '../../koneksi.php';

require_once __DIR__ . '/../assets/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download Laporan Service Selesai</title>
    <link rel="icon" href="../../public/assets/img/home.png" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/css/print.css">
</head>

<body>
<img id="logo" src="../assets/img/kop_dfncom.png" alt="">
<h1 id="h1" >Data Service Selesai</h1>

<table id="table_id" border=1 class="table-striped jambo_table bulk_action" width="100%" >
    <tr>
        <th width="30">NO</th>
        <th>NO SERVICE</th>
        <th>TANGGAL MASUK</th>
        <th>NAMA PELANGGAN</th>
        <th>KATEGORI</th>
        <th>TYPE</th>
        <th>KELUHAN</th>
        <th>TEKNISI</th>
        <th>TANGGAL KELUAR</th>
        <th>HARGA</th>
    </tr>
    
    ';
$sql = mysqli_query($koneksi, "SELECT service.*,admin.id,admin.name,pelanggan.id_pelanggan,pelanggan.nama FROM service,admin,pelanggan WHERE service.id_admin = admin.id AND service.id_pelanggan = pelanggan.id_pelanggan AND progres IN ('Selesai Pengerjaan') ORDER BY no_service ASC");
while ($data = mysqli_fetch_assoc($sql)) {
    $i = 1;
    foreach ($sql as $data) {
        $html .= '<tr>
            <td>' . $i++ . '</td>
            <td align="left">DC00' . $data['no_service'] . '</td>
            <td align="left">' . $data['tanggal'] . '</td>
            <td align="left">' . $data['nama'] . '</td>
            <td align="left">' . $data['kategori'] . '</td>
            <td align="left">' . $data['type'] . '</td>
            <td align="left">' . $data['keluhan'] . '</td>
            <td align="left">' . $data['name'] . '</td>
            <td align="left">' . $data['tgl_update'] . '</td>
            <td align="left">Rp.' . number_format($data['totharga']) . ',-</td>
            </tr>';
    }
}

$html .=    ' 

';
$total = $_POST['totharga'];
$sql = mysqli_query($koneksi, "SELECT service.*,admin.id,admin.name,pelanggan.id_pelanggan,pelanggan.nama FROM service,admin,pelanggan WHERE service.id_admin = admin.id AND service.id_pelanggan = pelanggan.id_pelanggan AND progres IN ('Selesai Pengerjaan') ORDER BY no_service ASC");
$totharga = 0;

while ($data = mysqli_fetch_array($sql)) {
    $totharga += $data['totharga'];
}
$html .= '
    <tfoot>
    <tr>
    <td colspan="8">Total :</td>
    <td colspan="2">Rp. ' . number_format($totharga) . ',-</td>
    </tr>
    
    </tfoot>  
        ';


$html .=    '</table>
<p id="p1" >' . date('l, d / M / y') . '</p>
<p id="p1">
                Pemilik DFN Computer,
                <br><br><br><br>
               <br><small>
               <u>Defani Ahmad S.Kom</u>
               </small>
            </p>
</body>
</html> 
';


$mpdf->WriteHTML($html);
$mpdf->Output('data_transaksi_selesai.pdf', 'I');


?>