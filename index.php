<?php
session_start();
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
  <link href="public/assets/img/home.png" rel="icon">
  <link href="public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="public/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="public/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <?php
  include 'koneksi.php';
  ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="public/assets/img/logo.png" alt="">
        <span>DFN Computer</span>
      </a>

      <!-- NAVBAR -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#service">Service</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="autentication.php">Login & Sign Up</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Landing Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Monitoring Service DFN Computer</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">DFN Computer adalah usaha di bidang Teknologi Informasi yang mempunyai pelayanan dalam service peralatan komputer yang terpercaya.</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Lebih detail</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="public/assets/img/features-2.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Landing -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>DFN Computer</h3>
              <h2>Mengenal lebih dekat dengan DFN Computer</h2>
              <p>
                DFN Computer adalah perusahaan di bidang Teknologi Informasi yang mempunyai pelayanan dalam service peralatan komputer yang terpercaya. DFN Computer berdiri tahun 2021 di Blimbing Rt 04/Rw 06 Wonorejo,
                Polokarto, Sukoharjo. DFN Computer ini memiliki tim kerja yang sangat profesional, tentunya pasti mengutamakan pelayanan dan kepuasan pelanggan setianya. Layanan service sangat memudahkan setiap customer untuk solusi terbaik jika ada perangkat yang bermasalah.
              </p>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="public/assets/img/DFNCOM.jpeg" class="img-fluid" alt="">
          </div>

        </div>
      </div>
    </section><!-- End About Section -->

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


    <!-- ======= Features Section ======= -->
    <section id="service" class="features">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Layanan Service</h2>
          <p>Layanan yang disediakan DFN Computer</p>
        </header>

        <div class="row">

          <div class="col-lg-6">
            <img src="public/assets/img/fitur.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
            <div class="row align-self-center gy-4">
              <?php
              $sql = mysqli_query($koneksi, "SELECT * FROM jasa");
              while ($data = mysqli_fetch_array($sql)) {
              ?>
                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3><?php echo $data['keterangan']; ?></h3>
                  </div>
                </div>
              <?php
              }
              ?>

            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- End Features Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </header>
        <div class="row gy-6 justify-content-center">
          <div class="col-lg-12">
            <div class="row gy-4">
              <div class="col-md-3">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Blimbing Rt 04/Rw 06 Wonorejo,<br> Polokarto, Sukoharjo</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+62 812-2531-0991</p>
                  <br>
                  <br>
                </div>
              </div>
              <div class="col-md-3">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>dfncomputer@gmail.com</p>
                  <br>
                  <br>
                </div>
              </div>
              <div class="col-md-3">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Sunday<br>9:00AM - 05:00PM</p>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'footer.php';
  ?>
  <!-- End Footer -->
  <!-- <a href="#" class="justify-content-center"><i class="bi bi-whatsapp"></i></a> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="public/assets/vendor/aos/aos.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="public/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="public/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="public/assets/js/main.js"></script>

</body>

</html>