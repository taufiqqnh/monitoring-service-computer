<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}
?>
<script>
    $(document).ready(function() {
        $('#tablepembayaran').DataTable();
    });
</script>

<?php
if (isset($_POST['simpanambil'])) {
    $progres  = $_POST['progres'];

    $sql = mysqli_query($koneksi, "UPDATE service SET progres='$progres' WHERE no_service='$no_service'");

    if ($sql) {
        echo '<script>alert("Berhasil menyimpan data."); document.location="pembayaran.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }
}
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner ">
            <div class="page-header">
                <h4 class="page-title">Transaksi / Ambil Service</h4>
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
                        <a href="#">Transaksi</a>
                    </li>
                </ul>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablepembayaran" class="display table table-striped table-hover">
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
                                            <th style="width: 10%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");

                                        // $data = mysqli_query($koneksi, "SELECT * FROM detservice JOIN service on service.no_service = detservice.no_service");

                                        $data = mysqli_query($koneksi, "SELECT * FROM service JOIN pelanggan on pelanggan.id_pelanggan = service.id_pelanggan WHERE progres IN ('Selesai Pengerjaan') ORDER BY no_service DESC");
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
                                                    <!-- <a class="btn btn-link btn-primary" href="" role="button">
                                                        <i class="fa fa-edit"></i>
                                                    </a> -->
                                                    <button type="button" data-toggle="modal" class="btn btn-link btn-primary" data-target="#editservice_<?php echo $d['no_service']; ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <!-- Modal Edit Data-->
                                                    <div class="modal fade" id="editservice_<?php echo $d['no_service']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
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
                                                                    <form action="pembayaran_act.php" method="post">
                                                                        <form>
                                                                            <div class="row">

                                                                                <input id="no_service" type="hidden" name="no_service" class="form-control" value="<?php echo $d['no_service']; ?>">

                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>Nama Pelanggan</label>
                                                                                        <input id="nama" type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>Kategori</label>
                                                                                        <input id="kategori" type="text" name="kategori" class="form-control" value="<?php echo $d['kategori']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>Type</label>
                                                                                        <input id="type" type="text" name="type" class="form-control" value="<?php echo $d['type']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>Keluhan</label>
                                                                                        <input id="keluhan" type="text" name="keluhan" class="form-control" value="<?php echo $d['keluhan']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>Progress</label>
                                                                                        <select class="form-control input-border-buttom" name="progres" id="progres">
                                                                                            <option selected><?php echo $d['progres']; ?></option>
                                                                                            <option value="Di Ambil">Di Ambil</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>Keterangan</label>
                                                                                        <input id="keterangan" type="text" name="keterangan" class="form-control" value="<?php echo $d['keterangan']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>Harga</label>
                                                                                        <input id="harga" type="text" name="harga" class="form-control" value="" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer no-bd">
                                                                                <button type="submit" name="simpandata" id="addRowButton" class="btn btn-primary">Edit</button>
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