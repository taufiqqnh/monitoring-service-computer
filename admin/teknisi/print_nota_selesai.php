<?php
include '../../koneksi.php';
session_start();
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}

require_once __DIR__ . '/../assets/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Nota Selesai</title>

    <link rel="stylesheet" href="../assets/css/print.css">
    <!-- CSS only -->
<link href="assets/" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

';

//membuat variabel $no_service untuk menyimpan no_service dari GET no_service di URL


//query ke database SELECT tabel service berdasarkan no_service = $no_service
$sql = mysqli_query($koneksi, "SELECT service.*,admin.id,admin.name,pelanggan.id_pelanggan,pelanggan.nama FROM service,admin,pelanggan WHERE service.id_admin = admin.id AND service.id_pelanggan = pelanggan.id_pelanggan AND no_service= '$nomor'");



while ($data = mysqli_fetch_assoc($sql)) {
    $i = 1;
    foreach ($sql as $data) {
    }
}

//jika sudah mendapatkan parameter GET id dari URL
if (isset($_GET['no_service'])) {
    //membuat variabel $No_service untuk menyimpan No_service dari GET No_service di URL
    $nomor = $_GET['no_service'];

    //query ke database SELECT tabel tservice berdasarkan No_service = $No_service
    $select = mysqli_query($koneksi, "SELECT * FROM service JOIN pelanggan on pelanggan.id_pelanggan = service.id_pelanggan WHERE progres IN ('Selesai Pengerjaan') AND no_service= '$nomor'");

    //jika hasil query = 0 maka muncul pesan error
    if (mysqli_num_rows($select) == 0) {
        echo '<div class="alert alert-warning">No Service tidak ada dalam database.</div>';
        exit();
        //jika hasil query > 0
    } else {
        //membuat variabel $data dan menyimpan data row dari query
        $data = mysqli_fetch_assoc($select);
    }
}

$html .= '
        <img id="logo" src="../assets/img/kop_dfncom.png" alt="">
        <p id="no_service">No Service: <b>DC00' . $data['no_service'] . '</b></p>    
        <br>   <br>
        <h1 id="hnota" >Nota Service</h1>
        <h2 id="h2" >DFN Computer</h2>
        <table class="table" id="table1"  style="width:100%" >
        <tbody>

<tr>
        <th align=left height="40px" class="col1">Nama</th>
        <th  width="30px" class="col">:</th>
        <td align=left class="col">' . $data['nama'] . ' </td>

        <th align=left height="40px"  class="col1">Id Pelanggan</th>
        <th  width="30px" class="col">:</th>
        <td align=left width="240px"  height="50px" class="col">' . $data['id_pelanggan'] . '</td>
        
</tr>
<tr>
        <th align=left height="40px" class="col1">Type</th>
        <th  width="30px" class="col">:</th>
        <td align=left class="col">' . $data['type'] . ' </td>

        <th align=left height="40px"  class="col1">Keluhan</th>
        <th  width="30px" class="col">:</th>
        <td align=left width="240px"  height="50px" class="col">' . $data['keluhan'] . '</td>

</tr>
<tr>      
        <th align=left height="40px" class="col1">Keterangan</th>
        <th  width="30px" class="col">:</th>
        <td align=left class="col">' . $data['keterangan'] . ' </td>

        <th align=left height="40px"  class="col1">Harga</th>
        <th  width="30px" class="col">:</th>
        <td align=left width="240px"  height="50px" class="col">Rp.' . number_format($data['totharga']) . ',-</td>
</tr>
<tr>
        <th align=left height="40px"  class="col1">Tanggal Masuk</th>
        <th  width="30px" class="col">:</th>
        <td align=left width="240px"  height="50px" class="col">' . $data['tanggal'] . '</td>

        <th align=left height="40px"  class="col1">Tanggal Keluar</th>
        <th  width="30px" class="col">:</th>
        <td align=left width="240px"  height="50px" class="col">' . $data['tgl_update'] . '</td>
</tr>
</tbody>
</table>


<br>

<p  style="border: solid 1px #aaa; background: #white; padding: 10px; -moz-border-radius: 15px; -khtml-border-radius: 10px; -webkit-border-radius: 2px; border-radius: 2px; margin: 0; text-align: justify; line-height: 10px; height:60px; width:30%; color: black; font-size: 8px"><b>PERHATIAN</b> <br> + Nota jangan sampai hilang untuk claim garansi <br> + Nota wajib dibawa saat claim garansi sesuai kesepakatan <br> + Garansi hangus apabila nota hilang / segel rusak / kesalahan pemakaian <br> + Dengan menandatangani ini, pelanggan sudah dianggap menyetujui.



<div class="tabelttd">
<table>
<tr>
<td></td>
<td></td>
<td align="center">' . date('l, d / M / y') . '</td>
</tr>
<tr>
<td class="col" height="20px">&emsp;&emsp;</td>
<td class="col">&emsp;&emsp;</td>
<td class="col">&emsp;&emsp;</td>
</tr>
<tr>
<td align="center"><b>Pelanggan</td>
<td align="center">&emsp;&emsp;&emsp;&emsp;</td>
<td align="center"><b>Hormat Kami,</td>
</tr>
<tr>
<td class="col" height="70px">&emsp;&emsp;</td>
<td class="col">&emsp;&emsp;</td>
<td class="col">&emsp;&emsp;</td>
</tr>
<tr>
<td align="center">' . $data['nama'] . '</td>
<td></td>
<td align="center">' . $_SESSION['name'] . '</td>
</tr>

</table>
</div>

';


$html .=    '

</body>
</html> 
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
';


$mpdf->WriteHTML($html);
$mpdf->Output('Nota_selesai.pdf', 'I');
