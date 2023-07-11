<?php

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
//Set Your server key
Config::$serverKey = "SB-Mid-server-x41u_uXmrPejYeObFBuogFuo";
// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

// Required
include '../../../../../koneksi.php';
$no_service = $_GET['no_service'];
$data = mysqli_query($koneksi, "SELECT * FROM service,pelanggan WHERE service.id_pelanggan = pelanggan.id_pelanggan AND service.no_service = '$no_service'");
while ($d = mysqli_fetch_array($data)) {
    $nama = $d['nama'];
    $alamat = $d['alamat'];
    $email = $d['email'];
    $hp = $d['hp'];
    $totalharga = $d['totharga'];
    $noservice = $d['no_service'];
}
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => $totalharga, // no decimal allowed for creditcard
);
// Optional
$item_details = array(
    array(
        'id' => 'a1',
        'price' => $totalharga,
        'quantity' => 1,
        'name' => "No Service = $no_service"
    ),
);
// Optional
$customer_details = array(
    'first_name'    => $nama,
    'last_name'     => "",
    'email'         => $email,
    'phone'         => $hp,
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snapToken = Snap::getSnapToken($transaction);
// echo "snapToken = " . $snapToken;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment DFN Computer</title>

    <link href="../../../../../public/assets/img/home.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <br>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p>
                    <b>
                        Selesaikan Pembayaran Sekarang!!
                    </b>
                </p>
                <button id="pay-button" class="btn btn-primary">PILIH METODE PEMBAYARAN</button>
                <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
                <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-5l4WNNydIpDZtVTq"></script>
                <script type="text/javascript">
                    document.getElementById('pay-button').onclick = function() {
                        // SnapToken acquired from previous step
                        snap.pay('<?php echo $snapToken ?>');
                    };
                </script>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>