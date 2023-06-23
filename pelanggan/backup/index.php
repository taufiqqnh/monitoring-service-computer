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
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#service">Service</a></li>
                    <?php
                    if (isset($_SESSION['nama'])) { ?>
                        <li><a class="nav-link scrollto" href="#monitoring">Monitoring</a></li>
                    <?php } else {
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION['nama'])) { ?>
                        <li><a class="getstarted scrollto" href="login_pelanggan.php">Login</a></li>
                        <li><a class="getstarted scrollto" href="registrasi.php">Registrasi</a></li>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Monitoring Service DFN Computer</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">DFN Computer adalah perusahaan di bidang Teknologi Informasi yang mempunyai pelayanan dalam service peralatan komputer yang terpercaya.</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <button class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center" data-bs-toggle="modal" data-bs-target="#tambahService">
                                <span>Daftar Service</span>
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="../public/assets/img/features-2.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <!-- Modal Daftar -->
        <div class="modal" tabindex="-1" id="tambahService">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #4154f1; color:white;">
                        <h5 class="modal-title">Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="service_act.php" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="col-md-3 col-sm-3">
                                    <input type="hidden" class="form-control" name="id_pelanggan" id="id_pelanggan" value="<?php echo $_SESSION['id_pelanggan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-3 col-sm-3">
                                    <input type="hidden" class="form-control" name="no_service" id="no_service" value="<?php echo $No_Service ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" name="kategori" required>
                                    <option selected>Pilih Kategori</option>
                                    <option value="Komputer">Komputer</option>
                                    <option value="Printer">Printer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <input type="text" class="form-control" name="type" id="type" required>
                                <input type="hidden" class="form-control" name="progres" id="progres" value="Dalam Antrian">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keluhan</label>
                                <textarea type="text" class="form-control" name="keluhan" id="keluhan" required>

                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Daftar Service</button>
                        </div>
                </div>
            </div>
        </div>
        </form>
        <!-- End Modal Daftar-->


    </section>
    <!-- End Hero -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <div>
                            <?php
                            $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                            ?>
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo mysqli_num_rows($pelanggan); ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Pelanggan</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-gear" style="color: #ee6c20;"></i>
                        <div>
                            <?php
                            $service = mysqli_query($koneksi, "SELECT * FROM service");
                            ?>
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo mysqli_num_rows($service); ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Projects Service</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-people" style="color: #bb0852;"></i>
                        <div>
                            <?php
                            $teknisi = mysqli_query($koneksi, "SELECT * FROM admin WHERE level IN ('Teknisi')");
                            ?>
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo mysqli_num_rows($teknisi); ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Teknisi</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Counts Section -->

    <!-- Section Service -->
    <section id="service" class="service">

        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <header class="section-header">
                        <h2>Service</h2>
                        <p>Nomer Antrian Anda</p>
                    </header>
                    <div class="table-responsive" id="tablefilter">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-dark">
                                    <td>Nomor Service</td>
                                    <td>Kategori</td>
                                    <td>Type</td>
                                    <td>Keluhan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idp = $_SESSION['id_pelanggan'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM service WHERE progres IN ('Dalam Antrian') AND id_pelanggan='$idp' ORDER BY no_service desc");
                                if (mysqli_num_rows($sql) > 0) {
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                        echo '
                                        <tr>
                                        <td>DC00' . $data['no_service'] . '</td>
                                        <td>' . $data['kategori'] . '</td>
                                        <td>' . $data['type'] . '</td>
                                        <td>' . $data['keluhan'] . '</td>
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
    </section>
    <!-- EndSection Service -->

    <!-- Section Monitoring -->
    <section id="monitoring" class="monitoring">
        <!-- Modal Detail -->
        <div class="modal" tabindex="-1" id="detail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #4154f1; color:white;">
                        <h5 class="modal-title">Detail Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="tabledetail" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td>Nomor Service</td>
                                    <td>Kategori</td>
                                    <td>Type</td>
                                    <td>Keluhan</td>
                                    <td>Author</td>
                                    <td>Tanggal Service</td>
                                </tr>
                            <tbody>
                                <?php
                                $idp = $_SESSION['id_pelanggan'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM service WHERE progres IN ('Proses Pengerjaan', 'Selesai Pengerjaan') AND id_pelanggan='$idp' ORDER BY no_service desc");
                                if (mysqli_num_rows($sql) > 0) {
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                        echo '
                                        <tr>
                                        <td>DC00' . $data['no_service'] . '</td>
                                        <td>' . $data['kategori'] . '</td>
                                        <td>' . $data['type'] . '</td>
                                        <td>' . $data['keluhan'] . '</td>
                                        <td></td>
                                        <td> ' . $data['tanggal'] . ' </td>
                                        </tr>
                                        
                                        ';
                                    }
                                } else {
                                    echo '
                                    <tr>
                                        <td colspan="4"> Tidak ada data. </td>
                                    </tr>
                                    ';
                                }
                                ?>

                            </tbody>
                            </thead>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Payment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Detail -->
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <header class="section-header">
                        <h2>Monitoring</h2>
                        <p>Tracking Progres Service</p>
                    </header>
                    <div class="table-responsive" id="tablefilter">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-dark">
                                    <td>Nomor Service</td>
                                    <td>Kategori</td>
                                    <td>Type</td>
                                    <td>Keluhan</td>
                                    <td>Detail</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idp = $_SESSION['id_pelanggan'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM service WHERE progres IN ('Proses Pengerjaan', 'Selesai Pengerjaan') AND id_pelanggan='$idp' ORDER BY no_service desc");
                                if (mysqli_num_rows($sql) > 0) {
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                        echo '
                                        <tr>
                                        <td>DC00' . $data['no_service'] . '</td>
                                        <td>' . $data['kategori'] . '</td>
                                        <td>' . $data['type'] . '</td>
                                        <td>' . $data['keluhan'] . '</td>
                                        <td>
                                        <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail">
                                            <i class="bi bi-info-square"></i>
                                            </button>

                                        </td>
                                        </tr>
                                        
                                        ';
                                    }
                                } else {
                                    echo '
                                    <tr>
                                        <td colspan="4"> Tidak ada data. </td>
                                    </tr>
                                    ';
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- EndSection Monitoring -->

    <!-- ======= Footer ======= -->
    <?php
    include '../footer.php';
    ?>
    <!-- End Footer -->
    <!-- <a href="#" class="justify-content-center"><i class="bi bi-whatsapp"></i></a> -->
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