<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}
?>
<script>
    $(document).ready(function() {
        $('#tablemonitoring').DataTable();
    });
</script>
<div class="main-panel">
    <div class="content">
        <div class="page-inner ">
            <div class="page-header">
                <h4 class="page-title">Monitoring</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="index.php">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="monitoring_service.php">Data Monitoring</a>
                    </li>
                </ul>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h1 class="card-title">Data Monitoring Service</h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablemonitoring" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NO SERVICE</th>
                                            <th>NAMA PELANGGAN</th>
                                            <th>KATEGORI</th>
                                            <th>TYPE</th>
                                            <th>KELUHAN</th>
                                            <th>PROGRES</th>
                                            <th>TANGGAL</th>
                                            <th style="width: 5%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                        $data = mysqli_query($koneksi, "SELECT * FROM service JOIN pelanggan on pelanggan.id_pelanggan = service.id_pelanggan WHERE progres IN ('Proses Pengerjaan') ORDER BY no_service DESC");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>DC00<?php echo $d['no_service']; ?></td>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['kategori']; ?></td>
                                                <td><?php echo $d['type']; ?></td>
                                                <td><?php echo $d['keluhan']; ?></td>
                                                <td><?php echo $d['progres']; ?> </td>
                                                <td><?php echo $d['tanggal']; ?> </td>
                                                <td>
                                                    <a class="btn btn-link btn-primary" href="monitoring_transaksi.php?no_service=<?php echo $d['no_service']; ?>" role="button">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php
                                            }
                                                ?>

                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>