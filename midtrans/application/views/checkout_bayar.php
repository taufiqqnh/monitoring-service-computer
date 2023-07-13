<?php
session_start();
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-5l4WNNydIpDZtVTq"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <title>Konfirmasi Pembayaran DFN Computer</title>
  <link rel="icon" href="../../public/assets/img/home.png" type="image/x-icon" />
</head>

<body>
  <!-- As a heading -->
  <nav class="navbar bg-light">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">KONFIRMASI PEMBAYARAN</span>
    </div>
  </nav>
  <?php
  $no_service = $_GET['no_service'];
  $id = $_SESSION['id_pelanggan'];
  $service = mysqli_query($koneksi, "select * from service where id_pelanggan='$id' and no_service='$no_service' order by no_service desc");
  while ($i = mysqli_fetch_array($service)) {
  ?>
    <div class="container mt-5">
      <form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
        <center>
          <h2> KONFIRMASI PEMBAYARAN </h2>
          <H3> DFN COMPUTER </H3>
        </center>
        <input type="hidden" name="result_type" id="result-type" value="">
        <input type="hidden" name="result_data" id="result-data" value="">
        <div class="form-group">
          <label for="no">No Invoice</label>
          <input type="hidden" class="form-control" name="no_service" id="no_service" value="<?php echo $i['no_service'] ?>">
          <input type="text" class="form-control" name="no" id="no" value="DC00<?php echo $i['no_service'] ?>" readonly><br>
        </div>
        <div class="form-group">
          <label for="tgl">Tanggal</label>
          <input type="text" class="form-control" name="tgl" id="tgl" value="<?php echo date('d-m-Y', strtotime($i['tgl_update'])) ?>" readonly><br>
        </div>
        <div class="form-group">
          <label for="total">Total Bayar</label>
          <input type="text" class="form-control" name="total2" id="total2" value="<?php echo "Rp. " . number_format($i['totharga']) . " ,-" ?>" readonly><br>
        </div>
        <input type="hidden" class="form-control" name="total" id="total" value="<?php echo $i['totharga'] ?>">
        <button class="btn btn-primary" id="pay-button">Bayar</button>
      <?php
    }
      ?>

      <?php
      $pelanggan = mysqli_query($koneksi, "select * from pelanggan where id_pelanggan='$id'");
      while ($ii = mysqli_fetch_array($pelanggan)) {
      ?>
        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $ii['id_pelanggan'] ?>"><br>
        <input type="hidden" class="form-control" name="email" id="email" value="<?php echo $ii['email'] ?>"><br>
        <input type="hidden" class="form-control" name="alamat" id="alamat" value="<?php echo $ii['alamat'] ?>"><br>
        <input type="hidden" class="form-control" name="hp" id="hp" value="<?php echo $ii['hp'] ?>"><br>

      <?php
      }
      ?>
      </form>
    </div>

    <script type="text/javascript">
      $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var no = $("#no").val();
        var tgl = $("#tgl").val();
        var total = $("#total").val();
        var id = $("#id").val();
        var email = $("#email").val();
        var alamat = $("#alamat").val();
        var hp = $("#hp").val();
        $.ajax({
          type: 'POST',
          url: '<?= site_url() ?>/snap/token',
          data: {
            no: no,
            tgl: tgl,
            total: total,
            id: id,
            email: email,
            alamat: alamat,
            hp: hp
          },
          cache: false,

          success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type, data) {
              $("#result-type").val(type);
              $("#result-data").val(JSON.stringify(data));
              //resultType.innerHTML = type;
              //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

              onSuccess: function(result) {
                changeResult('success', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
              },
              onPending: function(result) {
                changeResult('pending', result);
                console.log(result.status_message);
                $("#payment-form").submit();
              },
              onError: function(result) {
                changeResult('error', result);
                console.log(result.status_message);
                $("#payment-form").submit();
              }
            });
          }
        });
      });
    </script>
</body>

</html>