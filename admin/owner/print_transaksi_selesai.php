<?php
include '../../koneksi.php';
// include 'header.php';
session_start();

?>

<script type="text/javascript">
    window.print()
</script>
<title>Laporan Service</title>
<link rel="icon" href="../../public/assets/img/home.png" type="image/x-icon" />
<link rel="stylesheet" href="../assets/css/cetak.css">
<div id="print">
    <table class='table1'>
        <tr>
            <td><img src='../../public/assets/img/home.png' height="100" width="100"></td>
            <td>
                <h1>Laporan Transaksi Service Selesai</h1>
                <h2>DFN Computer</h2>
                <p style="font-size:14px;">
                    <i>Blimbing Rt 04/Rw 06 Wonorejo, Polokarto, Sukoharjo, Indonesia
                    </i>
                </p>
            </td>
        </tr>
    </table>

    <table class='table'>
        <td>
            <hr />
        </td>

    </table>
    <td>
        <h3>LAPORAN TRANSAKSI SERVICE SELESAI</h3>
    </td>
    <tr>
        <td>
            <table border='1' class='table' width="100%">
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
                <?php
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT service.*,admin.id,admin.name,pelanggan.id_pelanggan,pelanggan.nama FROM service,admin,pelanggan WHERE service.id_admin = admin.id AND service.id_pelanggan = pelanggan.id_pelanggan AND progres IN ('Selesai Pengerjaan') ORDER BY no_service ASC");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td>
                            <center><?php echo $no++; ?></center>
                        </td>
                        <td>&nbsp;&nbsp;DC00<?php echo $d['no_service']; ?></td>
                        <td>&nbsp;&nbsp;<?php echo $d['tanggal']; ?> </td>
                        <td>&nbsp;&nbsp;<?php echo $d['nama']; ?></td>
                        <td>&nbsp;&nbsp;<?php echo $d['kategori']; ?></td>
                        <td>&nbsp;&nbsp;<?php echo $d['type']; ?></td>
                        <td>&nbsp;&nbsp;<?php echo $d['keluhan']; ?></td>
                        <td>&nbsp;&nbsp;<?php echo $d['name']; ?></td>
                        <td>&nbsp;&nbsp;<?php echo $d['tgl_update']; ?></td>
                        <td>&nbsp;&nbsp;Rp.<?php echo number_format($d['totharga']); ?>,-</td>
                    </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
    </table>
</div>
<div id="print">
    <table width="450" align="right" class="ttd">
        <tr>
            <td width="100px" style="padding:20px 20px 20px 20px;" align="center">
                <strong>Pemilik DFN Computer,</strong>
                <br><br><br><br>
                <strong><u>Defani Ahmad</u><br></strong><small></small>
            </td>
        </tr>
    </table>
</div>