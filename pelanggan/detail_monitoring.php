<?php include('../koneksi.php');
session_start();

$query = mysqli_query($koneksi, "SELECT max(no_service) as kodeTerbesar FROM service");
$data = mysqli_fetch_array($query);
$no_Service = $data['kodeTerbesar'];
$urutan = (int) substr($no_Service, 3, 3);
$urutan++;
$huruf = "DC";
$No_Service = $huruf . sprintf("%03s", $urutan + 1);

?>

<?php
//jika sudah mendapatkan parameter GET id dari URL
if (isset($_GET['no_service'])) {
    //membuat variabel $No_service untuk menyimpan No_service dari GET No_service di URL
    $nomor = $_GET['no_service'];

    //query ke database SELECT tabel tservice berdasarkan No_service = $No_service
    $select = mysqli_query($koneksi, "SELECT * FROM service WHERE no_service = $nomor");

    //jika hasil query = 0 maka muncul pesan error
    if (mysqli_num_rows($select) == 0) {
        echo '<div class="alert alert-warning">No Service tidak ada dalam database.</div>';
        exit();
        //jika hasil query > 0
    } else {
        //membuat variabel $data dan menyimpan data row dari query
        $data = mysqli_fetch_assoc($select);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Pendaftaran dan Monitoring Service</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../public/assets/img/home.png" rel="icon">
    <link href="../public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../public/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
                <img src="../public/assets/img/logo.png" alt="">
                <span>DFN Computer</span>
            </a>

            <!-- NAVBAR -->
            <nav id="navbar" class="navbar">
                <ul>
                    <?php
                    if (!isset($_SESSION['nama'])) { ?>

                    <?php } else { ?>
                        <li class="dropdown"><a href="#"><span><?php echo $_SESSION['nama']; ?></span> <i class="bi bi-chevron-down"></i></a>
                            <ul class="dropdown-active">
                                <li><a href="../logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Detail Section ======= -->
    <section id="detail" class="detail">

        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <header class="section-header">
                        <h2>Detail</h2>
                        <p>Monitoring</p>
                    </header>
                    <div class="table-responsive" id="tablefilter">
                        <table id="tabledetail" class="table table-striped table-hover">
                            <thead>
                                <?php
                                $idp = $_SESSION['id_pelanggan'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM service WHERE progres IN ('Proses Pengerjaan', 'Selesai Pengerjaan', 'Di Ambil') AND id_pelanggan='$idp' AND no_service = '$nomor'");

                                // $sql = mysqli_query($koneksi, "SELECT * FROM detservice JOIN service on service.no_service = detservice.no_service");

                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td>Nomor Service</td>
                                        <td>DC00<?php echo $data['no_service']; ?></td>
                                    <tr>
                                        <td>Kategori</td>
                                        <td><?php echo $data['kategori']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Type</td>
                                        <td><?php echo $data['type']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Keluhan</td>
                                        <td><?php echo $data['keluhan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Teknisi</td>
                                        <td><?php echo $data['teknisi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Service</td>
                                        <td><?php echo $data['tgl_input']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Progres</td>
                                        <td><?php echo $data['progres']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td><?php echo $data['keterangan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </thead>
                        </table>
                        <div>
                            <a class="btn btn-secondary" href="index.php#monitoring">Close</a>
                            <a class="btn btn-primary" href="../midtrans/examples/snap/checkout-process-simple-version.php">Payment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Detail -->

    <!-- ======= Footer ======= -->
    <?php
    include '../footer.php';
    ?>
    <!-- End Footer -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../public/assets/vendor/aos/aos.js"></script>
    <script src="../public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../public/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../public/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../public/assets/js/main.js"></script>

</body>

</html>