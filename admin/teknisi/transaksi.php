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
if (isset($_GET['no_service'])) {
    //membuat variabel $no_service untuk menyimpan no_service dari GET no_service di URL
    $no_service = $_GET['no_service'];

    //query ke database SELECT tabel tservice berdasarkan no_service = $no_service
    $select = mysqli_query($koneksi, "SELECT * FROM service JOIN pelanggan on pelanggan.id_pelanggan = service.id_pelanggan WHERE no_service= '$no_service'");
    // jika hasil query = 0 maka muncul pesan error
    if (mysqli_num_rows($select) == 0) {
        echo '<div class="alert alert-warning">Id Barang tidak ada dalam database.</div>';
        exit();
        //jika hasil query > 0
    } else {
        //membuat variabel $data dan menyimpan data row dari query
        $data = mysqli_fetch_assoc($select);
        // $data = mysqli_fetch_assoc($sql);
    }
}

?>
<?php
if (isset($_POST['simpan'])) {
    $progres  = $_POST['progres'];
    $keterangan  = $_POST['keterangan'];
    $sql = mysqli_query($koneksi, "UPDATE service SET 
    progres='$progres',
    keterangan='$keterangan' 
    WHERE no_service='$no_service'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo '<script>alert("Berhasil menyimpan data."); document.location="transaksi.php?no_service=' . $no_service . '";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }
}
?>

<?php
if (isset($_POST['Hargatroli'])) {
    $id_troli = $_POST['id_troli'];
    $id_harga = $_POST['id_harga'];
    $no_service = $_POST['no_service'];
    $jumlah = 1;
    $teknisi = ($_SESSION['name']);
    // $Harga_Barang = $_POST['Harga_Barang'];



    $cek = mysqli_query($koneksi, "SELECT * FROM troli WHERE id_troli='$id_troli'") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {

        $sql = mysqli_query($koneksi, "INSERT INTO troli(id_troli, no_service, id_harga, jumlah, teknisi) VALUES('$id_troli','$no_service', '$id_harga','$jumlah', '$teknisi')");

        if ($sql) {
            echo '<script>document.location="transaksi.php?no_service=' . $no_service . '#keranjang";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Gagal, Id Harga Sudah terdaftar.</div>';
    }
}
?>

<form action="transaksi.php?no_service=<?php echo $no_service; ?>" method="post">
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
                                        <b>No DC00<?php echo $no_service; ?></b>
                                    </i>
                                </center>
                            </div>
                            <div class=" card-body">
                                <form action="transaksi.php?no_service=<?php echo $no_service ?>" method="post">
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

                <a type="submit" class="btn btn-primary " id="btnharga" href="#harga">Harga</a>
                <a type="submit" class="btn btn-danger" id="btnjasa" href="#jasa">Jasa</a>

                <!-- Harga -->

                <div class="row" id="harga">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header ">
                                <center>
                                    <h2>Daftar Harga</h2>
                                </center>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tableharga" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">NO</th>
                                                <th>JENIS</th>
                                                <th>KATEGORI</th>
                                                <th>TYPE</th>
                                                <th>HARGA</th>
                                                <th style="width: 10%">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../koneksi.php';
                                            $no = 1;
                                            $sqlharga = mysqli_query($koneksi, "SELECT * FROM harga");
                                            if (mysqli_num_rows($sqlharga) > 0) {
                                                while ($dharga = mysqli_fetch_assoc($sqlharga)) {
                                                    echo '
                                                <tr>
                                                    <td>' . $no++ . '</td>
                                                    <td>' . $dharga['jenis'] . '</td>
                                                    <td>' . $dharga['kategori'] . '</td>
                                                    <td>' . $dharga['type'] . '</td>
                                                    <td>' . $dharga['harga'] . '</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="submit" class="btn btn-link btn-primary" name="Hargatroli">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    ';
                                                }
                                            } else {
                                                echo '
                                                <tr>
                                                    <td colspan="4"> Tidak ada data. </td>
                                                <tr>
                                                    ';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Harga -->

                <!-- Jasa -->

                <!-- Keranjang -->
                <div class="row" id="keranjang">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header ">
                                <center>
                                    <h2>Keranjang</h2>
                                </center>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tablekeranjang" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">NO</th>
                                                <th>KATEGORI</th>
                                                <th>KETERANGAN</th>
                                                <th>HARGA</th>
                                                <!-- <th style="width: 10%">ACTION</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($koneksi, "SELECT * FROM troli ORDER BY id_troli desc");

                                            $data = mysqli_query($koneksi, "SELECT harga.kategori, harga.type, harga.harga FROM troli 
                            JOIN service on service.no_service = troli.no_service 
                            JOIN harga on harga.id_harga = troli.id_harga
                            WHERE troli.no_service='$no_service'");
                                            if (mysqli_num_rows($data) > 0) {
                                                while ($d = mysqli_fetch_assoc($data)) {
                                                    echo '
                                <tr>
                                    <td>' . $no++ . '</td>
                                    <td>' . $d['kategori'] . '</td>
                                    <td>' . $d['type'] . '</td>
                                    <td>' . $d['harga'] . '</td>
                                    ';
                                                }
                                            } else {
                                                echo '
                                <tr>
                                    <td colspan="4"> Tidak ada data. </td>
                                <tr>
                                    ';
                                            }
                                            ?>
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
</form>