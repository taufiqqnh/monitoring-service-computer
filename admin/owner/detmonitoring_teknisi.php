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
                        <a href="monitoring_teknisi.php">Data Monitoring Teknisi</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Detail Monitoring Teknisi</a>
                    </li>
                </ul>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablemonitoring" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">NO</th>
                                            <th>NO SERVICE</th>
                                            <th>TANGGAL MASUK</th>
                                            <th>NAMA PELANGGAN</th>
                                            <th>KATEGORI</th>
                                            <th>PROGRES</th>
                                            <th style="width: 10%">DETAIL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $idadmin = $_GET['id'];

                                        $data = mysqli_query($koneksi, "SELECT * FROM service,admin,pelanggan WHERE service.id_admin=admin.id AND service.id_admin= $idadmin AND service.id_pelanggan=pelanggan.id_pelanggan");

                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>DC00<?php echo $d['no_service']; ?></td>
                                                <td><?php echo $d['tanggal']; ?></td>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['kategori']; ?></td>
                                                <td><?php echo $d['progres']; ?> </td>
                                                <td>
                                                    <button type="button" data-toggle="modal" class="btn btn-link btn-primary" data-target="#detservice_<?php echo $d['no_service']; ?>">
                                                        <i class="fa fa-list"></i>
                                                    </button>
                                                    <!-- Modal Edit Data-->
                                                    <div class="modal fade" id="detservice_<?php echo $d['no_service']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: blue; color:white;">
                                                                    <h3 class="modal-title">
                                                                        <span class="fw-light">
                                                                            Form Edit data Service
                                                                        </span>
                                                                        <span class="fw- bold">
                                                                            DC00<?php echo $d['no_service']; ?></span>
                                                                    </h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="transaksi_service_act.php" method="post">
                                                                        <form>
                                                                            <div class="row">
                                                                                <input id="no_service" type="hidden" name="no_service" class="form-control" value="<?php echo $d['no_service']; ?>">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Nama Pelanggan</label>
                                                                                        <input id="nama" type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Kategori</label>
                                                                                        <input id="kategori" type="text" name="kategori" class="form-control" value="<?php echo $d['kategori']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Type</label>
                                                                                        <input id="type" type="text" name="type" class="form-control" value="<?php echo $d['type']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Progress</label>
                                                                                        <input id="progres" type="text" name="progres" class="form-control" value="<?php echo $d['progres']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group">
                                                                                        <label>Keluhan</label>
                                                                                        <input id="keluhan" type="text" name="keluhan" class="form-control" value="<?php echo $d['keluhan']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group">
                                                                                        <label>Keterangan</label>
                                                                                        <input id="keterangan" type="text" name="keterangan" class="form-control" value="<?php echo $d['keterangan']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Tanggal Masuk</label>
                                                                                        <input id="tanggal" type="text" name="harga" class="form-control" value="<?php echo $d['tanggal']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Harga</label>
                                                                                        <input id="harga" type="text" name="harga" class="form-control" value="Rp. <?php echo number_format($d['totharga']); ?>,-" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer no-bd">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <!-- END Modal Edit Data-->

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