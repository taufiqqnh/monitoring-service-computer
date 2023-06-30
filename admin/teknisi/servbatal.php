<?php include 'header.php'; ?>
<script>
    $(document).ready(function() {
        $('#tabletransaksi').DataTable();
    });
</script>
<?php

//jika sudah mendapatkan parameter GET id dari URL
if (isset($_GET['no_service'])) {
    //membuat variabel $No_Nota untuk menyimpan no_service dari GET no_service di URL
    $no_service = $_GET['no_service'];

    //query ke database SELECT tabel tservice berdasarkan no_service = $no_service
    $sql = mysqli_query($koneksi, "SELECT * FROM service JOIN pelanggan on pelanggan.id_pelanggan = service.id_pelanggan WHERE no_service= '$no_service'");
    // jika hasil query = 0 maka muncul pesan error
    if (mysqli_num_rows($sql) == 0) {
        echo '<div class="alert alert-warning">Id Barang tidak ada dalam database.</div>';
        exit();
        //jika hasil query > 0
    } else {
        //membuat variabel $data dan menyimpan data row dari query
        // $data = mysqli_fetch_assoc($select);
        $data = mysqli_fetch_array($sql);
    }
}
if (isset($_POST['simpan'])) {
    $progres  = $_POST['progres'];
    $keterangan  = $_POST['keterangan'];
    $sql = mysqli_query($koneksi, "UPDATE service SET 
    progres='$progres',
    keterangan='$keterangan' 
    WHERE no_service='$no_service'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo '<script>alert("Berhasil menyimpan data."); document.location="service.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }
}
?>
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
                        <a href="servbatal.php?no_service=<?php echo $no_service ?>">Pembatalan Service</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class=" card-header ">
                            <center>
                                <h2>Pembatalan Service <b>DC00<?php echo $no_service ?></b></h2>
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">No Service</label>
                                <div class="col-md-9 p-0">
                                    <input type="text" class="form-control input-full" id="no_service" value="<?php echo $no_service ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Nama</label>
                                <div class="col-md-9 p-0">
                                    <input type="text" class="form-control input-full" id="nama" value="<?php echo $data['nama']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Kategori</label>
                                <div class="col-md-9 p-0">
                                    <input type="text" class="form-control input-full" id="kategori" value="<?php echo $data['kategori']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Type</label>
                                <div class="col-md-9 p-0">
                                    <input type="text" class="form-control input-full" id="type" value="<?php echo $data['type']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Keluhan</label>
                                <div class="col-md-9 p-0">
                                    <input type="text" class="form-control input-full" id="keluhan" value="<?php echo $data['keluhan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Progress</label>
                                <div class="col-md-9 p-0">
                                    <input type="text" class="form-control input-full" id="progres" value="<?php echo $data['progres']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class=" card-header ">
                            <center>
                                <h2>Keterangan Pembatalan Service <b>DC00<?php echo $no_service ?></b></h2>
                            </center>
                        </div>
                        <div class=" card-body">
                            <form action="servbatal.php?no_service=<?php echo $no_service ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Keterangan Pembatalan</label>
                                    <textarea type="text" class="form-control" id="keterangan" name="keterangan">
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Progress</label>
                                    <select class="form-control input-border-buttom" name="progres" id="progres">
                                        <option selected><?php echo $data['progres']; ?></option>
                                        <option value="Service Dibatalkan">Service Dibatalkan</option>
                                    </select>
                                </div>
                                <button type="submit" name="simpan" class="btn btn-primary btn-round ml-auto">Simpan</button>
                                <a type="submit" class="btn btn-danger btn-round ml-auto" href="service.php">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>