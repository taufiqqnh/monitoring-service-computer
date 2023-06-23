<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}
?>
<script>
    $(document).ready(function() {
        $('#tablebatal').DataTable();
    });
</script>

<div class="main-panel">
    <div class="content">
        <div class="page-inner ">
            <div class="page-header">
                <h4 class="page-title">Data Master</h4>
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
                        <a href="#">Data Master</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="service.php">Data Service</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="service_batal_tabel.php">Data Service yang Dibatalkan</a>
                    </li>
                </ul>
            </div>
            <!-- Tabel Proses dibatalkan -->
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h1 class="card-title">Data Service yang Dibatalkan</h1>
                                <a class="btn btn-danger btn-round ml-auto" href="service.php">
                                    <i class="fa fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablebatal" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NO SERVICE</th>
                                            <th>NAMA PELANGGAN</th>
                                            <th>KATEGORI</th>
                                            <th>TYPE</th>
                                            <th>KELUHAN</th>
                                            <th>PROGRES</th>
                                            <th>KETERANGAN</th>
                                            <th>TANGGAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                        $data = mysqli_query($koneksi, "SELECT * FROM service JOIN pelanggan on pelanggan.id_pelanggan = service.id_pelanggan WHERE progres IN ('Service Dibatalkan') ORDER BY no_service DESC");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>DC00<?php echo $d['no_service']; ?></td>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['kategori']; ?></td>
                                                <td><?php echo $d['type']; ?></td>
                                                <td><?php echo $d['keluhan']; ?></td>
                                                <td><?php echo $d['progres']; ?></td>
                                                <td><?php echo $d['keterangan']; ?></td>
                                                <td><?php echo $d['tanggal']; ?></td>
                                            <?php
                                        }
                                            ?>

                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tabel Proses dibatalkan -->
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>