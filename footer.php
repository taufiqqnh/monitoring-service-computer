<footer id="footer" class="footer fixed">
  <div class="footer-top">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <img src="public/assets/img/logo.png" alt="">
            <span>DFN Computer</span>
          </a>
          <p>DFN Computer adalah perusahaan di bidang Teknologi Informasi yang mempunyai pelayanan dalam service peralatan komputer yang terpercaya.</p>
          <div class="social-links mt-3">
            <a href="https://www.facebook.com/defani.ahmadramadhan" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://instagram.com/dfncomp?igshid=MzRlODBiNWFlZA==" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-12 footer-links">
          <h4 class="text-center text-md-start">Services</h4>
          <?php
          $sql = mysqli_query($koneksi, "SELECT * FROM jasa");
          while ($data = mysqli_fetch_array($sql)) {
          ?>
            <ul>
              <li>
                <i class="bi bi-chevron-right"></i>
                <a><?php echo $data['keterangan']; ?></a>
              </li>
            </ul>
          <?php
          }
          ?>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            Blimbing Rt 04/Rw 06 Wonorejo, <br>
            Polokarto, Sukoharjo,<br>
            Indonesia <br><br>
            <strong>Phone:</strong> +62 812-2531-0991<br>
            <strong>Email:</strong> dfncomputer@gmail.com<br>
          </p>

        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright 2023 <strong><a href="https://instagram.com/taufiqqnh_?igshid=MzRlODBiNWFlZA==" target="_blank">Taufiq NurHidayat</a></strong>
    </div>
    <!-- <div class="credits">
       Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
  </div>
</footer>