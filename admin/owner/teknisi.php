<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}
?>
<script>
    $(document).ready(function() {
        $('#tableteknisi').DataTable();
    });
</script>

<?php
if (isset($_POST['deleteteknisi'])) {
    $id_del = $_POST['id'];

    $del = mysqli_query($koneksi, "DELETE FROM admin WHERE id='$id_del'") or die(mysqli_error($koneksi));
    if ($del) {
        echo '<script>alert("Berhasil menghapus data."); document.location="teknisi.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }
}
?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner ">
            <div class="page-header">
                <h4 class="page-title">Data Teknisi</h4>
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
                        <a href="teknisi.php">Data Teknisi</a>
                    </li>
                </ul>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h1 class="card-title">Data Teknisi</h1>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambahTeknisi">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data Teknisi
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <!-- Modal Tambah Data-->
                            <div class="modal fade" id="tambahTeknisi" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: blue; color:white;">
                                            <h3 class="modal-title">
                                                <span class="fw- bold">
                                                    Form Tambah data teknisi
                                                </span>
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="teknisi_act.php" method="post">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama</label>
                                                            <input id="name" name="name" type="text" class="form-control" autocomplete="off" placeholder="Nama">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Username</label>
                                                            <input id="username" name="username" type="text" class="form-control" autocomplete="off" placeholder="Username">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Password</label>
                                                            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Email</label>
                                                            <input id="email" type="email" name="email" class="form-control" autocomplete="off" placeholder="Email">
                                                        </div>
                                                        <input type="hidden" class="form-control" id="level" name="level" value="Teknisi">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Modal Tambah Data-->

                            <div class="table-responsive">
                                <table id="tableteknisi" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">NO</th>
                                            <th>NAMA</th>
                                            <th>USERNAME</th>
                                            <th>EMAIL</th>
                                            <th>LEVEL</th>
                                            <th style="width: 10%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "SELECT * FROM admin WHERE level IN ('Teknisi')");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['name']; ?></td>
                                                <td><?php echo $d['username']; ?></td>
                                                <td><?php echo $d['email']; ?></td>
                                                <td><?php echo $d['level']; ?> </td>
                                                <td>
                                                    <!-- EDIT MEMBER -->
                                                    <div class="form-button-action">
                                                        <button type="button" data-toggle="modal" class="btn btn-link btn-primary" data-original-title="Edit" data-target="#editteknisi_<?php echo $d['id']; ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <!-- Button trigger modal Hapus-->
                                                        <button type="button" class="btn btn-link btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $d['id']; ?>">
                                                            <i class="fas fa fa-trash"></i>
                                                        </button>
                                                        <!-- Modal Hapus-->
                                                        <div class="modal fade" id="hapusModal<?php echo $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: red; color:white;">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus data Teknisi</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="teknisi.php" method="post">
                                                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                                            Apakah kamu yakin ingin menghapus data <b><?php echo $d['name']; ?></b>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="submit" name="deleteteknisi" value="Hapus" class="btn btn-danger"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <!-- Modal Edit Data-->
                                                        <div class="modal fade" id="editteknisi_<?php echo $d['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: blue; color:white;">
                                                                        <h3 class="modal-title">
                                                                            <span class="fw- bold">
                                                                                Form</span>
                                                                            <span class="fw-light">
                                                                                Edit data Teknisi
                                                                            </span>
                                                                        </h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="teknisi_update.php" method="post">
                                                                            <form>
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group form-group-default">
                                                                                            <label>Nama</label>
                                                                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                                                            <input id="name" name="name" type="text" value="<?php echo $d['name']; ?>" class="form-control">
                                                                                            </input>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group form-group-default">
                                                                                            <label>Username</label>
                                                                                            <input id="username" name="username" type="text" value="<?php echo $d['username']; ?>" class="form-control">
                                                                                            </input>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group form-group-default">
                                                                                            <label>Password</label>
                                                                                            <input id="password" type="password" name="password" class="form-control" placeholder="Masukan password kembali" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group form-group-default">
                                                                                            <label>Email</label>
                                                                                            <input id="email" type="email" name="email" value="<?php echo $d['email']; ?>" class="form-control">
                                                                                            <input id="level" type="hidden" name="level" value="<?php echo $d['level']; ?>" class="form-control">
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
                                                            <!-- END Modal Edit Data-->
                                                        <?php
                                                    }
                                                        ?>
                                                        </div>
                                                    </div>
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