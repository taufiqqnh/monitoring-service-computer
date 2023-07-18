<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}
?>

<?php
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == "berhasil") {

        echo '<script type ="text/JavaScript">';
        echo 'swal({

                title: "Berhasil!",

                text: "Update Profile Berhasil",

                icon: "success",

                button: true

            });';
        echo '</script>';
    }
}
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner ">
            <div class="page-header">
                <h4 class="page-title">Profile</h4>
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
                        <a href="profile.php">My Profile</a>
                    </li>
                </ul>
            </div>
            <?php
            include '../../koneksi.php';
            $id = $_SESSION['id'];
            $data = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id'");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <!-- Form Profile -->
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h1 class="card-title">My Profile</h1>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#editprofile">
                                        <i class="fa fa-plus"></i>
                                        Edit Data
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                <!-- Modal Edit Data-->
                                <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: blue; color:white;">
                                                <h3 class="modal-title">
                                                    <span class="fw- bold">
                                                        Form</span>
                                                    <span class="fw-light">
                                                        Edit data profile <?php echo $d['name']; ?>
                                                    </span>
                                                </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="profile_update.php" method="post">

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama</label>
                                                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                                <input id="name" name="name" type="text" class="form-control" value="<?php echo $d['name']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Username</label>
                                                                <input id="username" name="username" type="text" class="form-control" value="<?php echo $d['username']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Password</label>
                                                                <input id="password" name="password" type="password" class="form-control" placeholder="Masukan password kembali" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Email</label>
                                                                <input id="email" type="email" name="email" class="form-control" value="<?php echo $d['email']; ?>">
                                                                <input id="level" type="hidden" name="level" class="form-control" value="Owner" readonly>
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

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input id="name" name="name" type="text" class="form-control" value="<?php echo $d['name']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input id="username" name="username" type="text" class="form-control" value="<?php echo $d['username']; ?>" readonly>
                                            <input id="password" name="password" type="hidden" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input id="email" type="email" name="email" class="form-control" value="<?php echo $d['email']; ?>" readonly>
                                        </div>

                                    </div>
                                    <div class=" col-sm-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input id="status" type="text" name="status" class="form-control" value="Owner" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Form Profile -->
            <?php
            } ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>