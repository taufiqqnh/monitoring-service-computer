<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}
?>
<script>
    $(document).ready(function() {
        $('#tablejasa').DataTable();
    });
</script>

<?php
if (isset($_POST['deletejasa'])) {
    $id_del = $_POST['id_jasa'];

    $del = mysqli_query($koneksi, "DELETE FROM jasa WHERE id_jasa='$id_del'") or die(mysqli_error($koneksi));
    if ($del) {
        echo '<script>alert("Berhasil menghapus data."); document.location="layanan.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses hapus data.</div>';
    }
}
?>

<?php
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == "sukses") {

        echo '<script type ="text/JavaScript">';
        echo 'swal({

                title: "Berhasil!",

                text: "Tambah Layanan Berhasil",

                icon: "success",

                button: true

            });';
        echo '</script>';
    } elseif ($_GET['alert'] == "berhasil") {

        echo '<script type ="text/JavaScript">';
        echo 'swal({

                title: "Berhasil!",

                text: "Update Layanan Berhasil",

                icon: "success",

                button: true

            });';
        echo '</script>';
    }
}
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Layanan</h4>
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
                        <a href="layanan.php">Data Layanan</a>
                    </li>
                </ul>
            </div>

            <!-- Tabel Jasa Yang Disediakan-->
            <div class="row ">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h1 class="card-title">Data Jasa yang disediakan DFN Computer</h1>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambahjasa">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data Layanan
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="modal fade" id="tambahjasa" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: blue; color:white;">
                                            <h3 class="modal-title">
                                                <span class="fw- bold">
                                                    Form</span>
                                                <span class="fw-light">
                                                    Tambah data jasa
                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="layanan_act.php" method="post">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Kategori</label>
                                                            <select class="form-control input-border-buttom" name="kategori" id="kategori" required>
                                                                <option selected value="">Pilih kategori</option>
                                                                <option value="Komputer">Komputer</option>
                                                                <option value="Printer">Printer</option>
                                                                <option value="Service">Service</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>keterangan</label>
                                                            <input type="text" class="form-control" name="keterangan" id="keterangan" required placeholder="Keterangan" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" name="update" id="addRowButton" class="btn btn-primary">Add</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <!-- END Modal tambah Data-->
                            </div>
                            <div class="table-responsive">
                                <table id="tablejasa" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">NO</th>
                                            <th>KATEGORI</th>
                                            <th>KETERANGAN</th>
                                            <th style="width: 10%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "SELECT * FROM jasa");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['kategori']; ?></td>
                                                <td><?php echo $d['keterangan']; ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary" data-target="#editjasa_<?php echo $d['id_jasa']; ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <!-- Button trigger modal Hapus-->
                                                        <button type="button" class="btn btn-link btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $d['id_jasa']; ?>">
                                                            <i class="fas fa fa-trash"></i>
                                                        </button>

                                                        <!-- Modal Hapus-->
                                                        <div class="modal fade" id="hapusModal<?php echo $d['id_jasa']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: red; color:white;">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus data Jasa</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="layanan.php" method="post">
                                                                            <input type="hidden" name="id_jasa" value="<?php echo $d['id_jasa']; ?>">
                                                                            Apakah kamu yakin ingin menghapus data <b><?php echo $d['kategori']; ?></b>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="submit" name="deletejasa" value="Hapus" class="btn btn-danger"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    <!-- Modal Edit Data jasa-->
                                                    <div class="modal fade" id="editjasa_<?php echo $d['id_jasa']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: blue; color:white;">
                                                                    <h3 class="modal-title">
                                                                        <span class="fw- bold">
                                                                            Form</span>
                                                                        <span class="fw-light">
                                                                            Edit data Jasa
                                                                        </span>
                                                                    </h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="layanan_update.php" method="post">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Kategori</label>
                                                                                    <select class="form-control input-border-buttom" name="kategori" id="kategori" required>
                                                                                        <option selected value="<?php echo $d['kategori']; ?>">Pilih kategori</option>
                                                                                        <option value="Komputer">Komputer</option>
                                                                                        <option value="Printer">Printer</option>
                                                                                        <option value="Service">Service</option>
                                                                                    </select>

                                                                                    <input type="hidden" name="id_jasa" value="<?php echo $d['id_jasa']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Keterangan</label>
                                                                                    <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?php echo $d['keterangan']; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer no-bd">
                                                                            <button type="submit" name="update" id="addRowButton" class="btn btn-primary">Save</button>
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <!-- END Modal Edit Data jasa-->
                                                    </div>
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
            <!-- End Tabel Jasa -->

        </div>
    </div>
    <?php include 'footer.php'; ?>