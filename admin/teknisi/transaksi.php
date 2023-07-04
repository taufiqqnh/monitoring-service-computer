<?php include 'header.php'; ?>
<script>
    $(document).ready(function() {
        $('#tableharga').DataTable();
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
    }
}

?>
<?php
if (isset($_POST['simpan'])) {
    $progres  = $_POST['progres'];
    $keterangan  = $_POST['keterangan'];

    $sql = mysqli_query($koneksi, "UPDATE service SET progres='$progres', keterangan='$keterangan' WHERE no_service='$no_service'");

    $sql = mysqli_query($koneksi, "INSERT into detservice (no_service, id_harga, jumlah, teknisi, totharga) SELECT no_service, id_harga, jumlah, teknisi, totharga FROM troli WHERE no_service='$no_service'");

    $sql = mysqli_query($koneksi, "	DELETE FROM troli WHERE no_service='$no_service'") or die(mysqli_error($koneksi));

    if ($sql) {
        echo '<script>alert("Berhasil menyimpan data."); document.location="transaksi.php?no_service=' . $no_service . '";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }
}
?>
<?php

if (isset($_POST['deletekeranjang'])) {
    $id_del = $_POST['id_troli'];

    $del = mysqli_query($koneksi, "DELETE FROM troli WHERE id_troli='$id_del'") or die(mysqli_error($koneksi));
    if ($del) {
        echo '<script>alert("Berhasil menghapus data."); document.location="transaksi.php?no_service=' . $no_service . '";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses hapus data.</div>';
    }
}

?>

<?php
if (isset($_POST['Hargatroli'])) {
    $id_troli = $_POST['id_troli'];
    $id_harga = $_POST['id_harga'];
    $jumlah = $_POST['harga'];
    $teknisi = ($_SESSION['name']);
    $total = 1;

    $cek = mysqli_query($koneksi, "SELECT * FROM troli WHERE id_troli='$id_troli'") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($cek) == 0) {

        $sql = mysqli_query($koneksi, "INSERT INTO troli(id_troli, no_service, id_harga, jumlah, teknisi, totharga) VALUES('$id_troli','$no_service', '$id_harga','$jumlah', '$teknisi' ,'$total')");

        if ($sql) {
            echo '<script>alert("Berhasil menyimpan data."); document.location="transaksi.php?no_service=' . $no_service . '";</script>';
        } else {
            echo '<script>alert("Gagal melakukan proses tambah data.");</script>';
        }
    } else {
        echo '<script>alert("Id Harga Sudah terdaftar");</script>';
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
                                    <b>No DC00<?php echo $no_service; ?></b>
                                </i>
                            </center>
                        </div>
                        <div class="card-body">
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
                                        <label class="form-label">Keluhan</label>
                                        <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?php echo $data['keluhan']; ?>" readonly>
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

            <!-- Harga -->

            <div class="row" id="harga">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <center>
                                <h2>Daftar Harga </h2>
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
                                            <th>TYPE / KETERANGAN</th>
                                            <th>HARGA</th>
                                            <th style="width: 10%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $dataharga = mysqli_query($koneksi, "SELECT * FROM harga");
                                        while ($d = mysqli_fetch_array($dataharga)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['jenis']; ?></td>
                                                <td><?php echo $d['kategori']; ?></td>
                                                <td><?php echo $d['type']; ?></td>
                                                <td><?php echo $d['harga']; ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary" data-target="#tambah_<?php echo $d['id_harga']; ?>">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                        <!-- Modal Troli-->
                                                        <div class="modal fade" id="tambah_<?php echo $d['id_harga']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style=" background-color: blue; color:white;">
                                                                        <h3 class="modal-title">
                                                                            <span class="fw-light">
                                                                                Apakah kamu ingin menambahkan <b><?php echo $d['jenis']; ?></b>
                                                                                <b><?php echo $d['type']; ?></b>
                                                                            </span>
                                                                        </h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="transaksi.php?no_service=<?php echo $no_service ?>" method="post">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <input type="hidden" name="id_harga" value="<?php echo $d['id_harga']; ?>">
                                                                                    <input type="hidden" name="harga" value="<?php echo $d['harga']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer no-bd">
                                                                                <button type="submit" name="Hargatroli" id="addRowButton" class="btn btn-primary">Add</button>
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END Modal Troli-->
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
            <!-- Harga -->

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
                                            <th>NO</th>
                                            <th>JENIS</th>
                                            <th>KATEGORI</th>
                                            <th>KETERANGAN</th>
                                            <th>HARGA</th>
                                            <th style="width: 10%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $datatroli = mysqli_query($koneksi, "SELECT * FROM troli ORDER BY id_troli desc");
                                        $datatroli = mysqli_query($koneksi, "SELECT * FROM troli 
                                            JOIN service on service.no_service = troli.no_service 
                                            JOIN harga on harga.id_harga = troli.id_harga
                                            WHERE troli.no_service='$no_service'");
                                        $total = 0;
                                        while ($d = mysqli_fetch_array($datatroli)) {
                                            $total += $d['harga'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['jenis']; ?></td>
                                                <td><?php echo $d['kategori']; ?></td>
                                                <td><?php echo $d['type']; ?></td>
                                                <td><?php echo $d['harga']; ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Button trigger modal Hapus-->
                                                        <button type="button" class="btn btn-link btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $d['id_troli']; ?>">
                                                            <i class="fas fa fa-trash"></i>
                                                        </button>

                                                        <!-- Modal Hapus-->
                                                        <div class="modal fade" id="hapusModal<?php echo $d['id_troli']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: red; color:white;">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus data Troli</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="transaksi.php?no_service=<?php echo $no_service ?>" method="post">
                                                                            <input type="hidden" name="id_troli" value="<?php echo $d['id_troli']; ?>">
                                                                            Apakah kamu yakin ingin menghapus data <b><?php echo $d['jenis']; ?></b>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="submit" name="deletekeranjang" value="Hapus" class="btn btn-danger"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                            </div>


                        <?php
                                        }

                        ?>
                        </td>
                        </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-center"><b>Total</b></th>
                                <th colspan="2"><b>Rp. <?php echo number_format($total) ?></b></th>

                            </tr>
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