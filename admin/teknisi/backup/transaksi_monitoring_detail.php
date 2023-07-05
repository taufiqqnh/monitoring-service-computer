<?php include 'header.php'; ?>
<script>
    $(document).ready(function() {
        $('#tableharga').DataTable();
    });
    $(document).ready(function() {
        $('#tablejasa').DataTable();
    });
    $(document).ready(function() {
        $('#tablekeranjang').DataTable();
    });
</script>

<?php

//jika sudah mendapatkan parameter GET id dari URL
if (isset($_GET['id_troli'])) {
    //membuat variabel $No_Nota untuk menyimpan No_Nota dari GET No_Nota di URL
    $id_troli = $_GET['id_troli'];
    $id_harga = $_GET['id_harga'];

    //query ke database SELECT tabel tservice berdasarkan No_Nota = $No_Nota
    // $sql = mysqli_query($koneksi, "SELECT * FROM service JOIN pelanggan on pelanggan.id_pelanggan = service.id_pelanggan WHERE no_service= '$no_service'");
    $sql = mysqli_query($koneksi, "SELECT * FROM troli JOIN harga on harga.id_harga = troli.id_harga WHERE id_troli= '$id_troli'");
    $sql = mysqli_query($koneksi, "SELECT * FROM harga WHERE id_harga= '$id_harga'");
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

?>

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
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="transaksi.php?no_service=<?php echo $no_service ?>">Data Transaksi</a>
                    </li>
                </ul>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class=" card-header ">
                            <center>
                                <h2>Data Transaksi</h2>
                                <i>
                                    <b>No DC00<?php echo $id_harga; ?></b>
                                </i>
                            </center>
                        </div>
                        <div class=" card-body">
                            <form action="transaksi_detail.php?id_troli=<?php echo $id_troli ?>" method="post">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>

                                        <input type="hidden" class="form-control" id="no_service" name="no_service" value="<?php echo $no_service ?>">

                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        <input type="text" class="form-control" id="type" name="type" value="<?php echo $data['type']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Progress</label>
                                        <select class="form-control input-border-buttom" name="progres" id="progres">
                                            <option selected><?php echo $data['progres']; ?></option>
                                            <option value="Selesai Pengerjaan">Selesai Pengerjaan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan" required><?php echo $data['keterangan']; ?></textarea>
                                    </div>
                                    <button type="submit" name="simpan" class="btn btn-primary btn-round ml-auto">Simpan</button>
                                    <a type="submit" class="btn btn-danger btn-round ml-auto" href="monitoring_service.php">Kembali</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>