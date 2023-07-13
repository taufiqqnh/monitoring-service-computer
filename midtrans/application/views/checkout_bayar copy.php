<?php
session_start();
include '../koneksi.php';
?>
<html>
<title>Checkout</title>
  <head>
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-Ok3wtGPRbBWQy32_"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>
  <body>

  <div id="main" class="col-md-9">
				
				<h4>KONFIRMASI PEMBAYARAN</h4>


							<table class="table table-bordered"> 
								<tbody>
									<?php 
									$id_invoice = $_GET['id'];
									$id = $_SESSION['customer_id'];
									$invoice = mysqli_query($koneksi,"select * from invoice where invoice_customer='$id' and invoice_id='$id_invoice' order by invoice_id desc");
									while($i = mysqli_fetch_array($invoice)){
										?>
										<tr>
											<th width="20%">No.Invoice</th>	
											<td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
										</tr>
										<tr>
											<th>Tanggal</th>	
											<td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])) ?></td>
										</tr>
										<tr>
											<th>Total Bayar</th>	
											<td><b> <mark style="background: black;"> <font color='white'><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></b></td>
										</tr>
										<tr>
											<th>Status</th>	
											<td>

											<?php 
													if($i['invoice_status'] == 1){
														echo "<span class='label label-default'>Menunggu Pembayaran</span>";
													}elseif($i['invoice_status'] == 2){
														echo "<span class='label label-primary'>Sedang Diproses</span>";
													}elseif($i['invoice_status'] == 3){
														echo "<span class='label label-warning'>Dikirim</span>";
													}elseif($i['invoice_status'] == 4){
														echo "<span class='label label-success'>Selesai</span>";
													}
													?>
											</td>
										</tr>
										<?php 
									}
									?>
							
								</tbody>
							</table>
						
							
						
							
							
						</div>	

					</div>
				</div>

			</div>
    
    <form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
    </form>
    
    <button id="pay-button">Pay!</button>
    <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?=site_url()?>/snap/token',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
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
