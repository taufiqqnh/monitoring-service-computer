<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard | Admin DFN Computer</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../public/assets/img/home.png" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">

	<?php
	include '../../koneksi.php';
	?>
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="#" class="logo">
					<img src="../assets/img/dfnlogo.png" style=" width: 180px; height: 65px;" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<?php
			include 'navbar.php';
			?>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<?php
		include 'sidebar.php';
		?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard Teknisi</h2>
								<h5 class="text-white op-7 mb-2">Monitoring Service</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-xl-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-users text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<?php
												$pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
												?>
												<p class="card-category">Jumlah Pelanggan</p>
												<h4 class="card-title"><?php echo mysqli_num_rows($pelanggan); ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-settings text-primary"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<?php
												$service = mysqli_query($koneksi, "SELECT * FROM service");
												?>
												<p class="card-category">Jumlah Service</p>
												<h4 class="card-title"><?php echo mysqli_num_rows($service); ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<div class="card-title">Data Service</div>
									<div class="card-category">Informasi tentang data service</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<?php
											$data1 = mysqli_query($koneksi, "SELECT * FROM service WHERE progres IN ('Dalam Antrian')");
											?>
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Dalam Antrian</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<?php
											$data2 = mysqli_query($koneksi, "SELECT * FROM service WHERE progres IN ('Proses Pengerjaan')");
											?>
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Proses Pengerjaan</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<?php
											$data3 = mysqli_query($koneksi, "SELECT * FROM service WHERE progres IN ('Selesai Pengerjaan')");
											?>
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Selesai Pengerjaan</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<?php
											$data4 = mysqli_query($koneksi, "SELECT * FROM service WHERE progres IN ('Di Ambil')");
											?>
											<div id="circles-4"></div>
											<h6 class="fw-bold mt-3 mb-0">Di Ambil</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Total Pelanggan</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<?php
												$member = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE status IN ('Member')");
												?>
												<h6 class="fw-bold text-uppercase text-primary op-8">Total Member</h6>
												<h3 class="fw-bold"><?php echo mysqli_num_rows($member); ?></h3>
											</div>
											<div>
												<?php
												$belmember = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE status IN ('Member')");
												?>
												<h6 class="fw-bold text-uppercase text-warning op-8">Total Belum Member</h6>
												<h3 class="fw-bold"><?php echo mysqli_num_rows($belmember); ?></h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Data Gender Pelanggan </div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<?php
										$lk = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE jk IN ('Laki-laki')");

										$pr = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE jk IN ('Perempuan')");
										?>
										<canvas id="pieChart" style="width: 50%; height: 50%"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Data Kategori Service</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<?php
										$komputer = mysqli_query($koneksi, "SELECT * FROM service WHERE kategori IN ('Komputer')");

										$printer = mysqli_query($koneksi, "SELECT * FROM service WHERE kategori IN ('Printer')");
										?>
										<canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			include 'footer.php';
			?>
		</div>
	</div>

	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	<script>
		Circles.create({
			id: 'circles-1',
			radius: 45,
			value: <?php echo mysqli_num_rows($data1); ?>,
			maxValue: 10,
			width: 7,
			text: <?php echo mysqli_num_rows($data1); ?>,
			colors: ['#f1f1f1', '#FF9E27'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-2',
			radius: 45,
			value: <?php echo mysqli_num_rows($data2); ?>,
			maxValue: 10,
			width: 7,
			text: <?php echo mysqli_num_rows($data2); ?>,
			colors: ['#f1f1f1', '#2BB930'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-3',
			radius: 45,
			value: <?php echo mysqli_num_rows($data3); ?>,
			maxValue: 10,
			width: 7,
			text: <?php echo mysqli_num_rows($data3); ?>,
			colors: ['#f1f1f1', '#F25961'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-4',
			radius: 45,
			value: <?php echo mysqli_num_rows($data4); ?>,
			maxValue: 10,
			width: 7,
			text: <?php echo mysqli_num_rows($data4); ?>,
			colors: ['#f1f1f1', '#068FFF'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["Member", "Belum Member"],
				datasets: [{
					label: "Total Pelanggan",
					backgroundColor: ['#068FFF', '#FFA41B'],
					borderColor: 'rgb(23, 125, 255)',
					data: [<?php echo mysqli_num_rows($member); ?>, <?php echo mysqli_num_rows($belmember); ?>],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines: {
							drawBorder: false,
							display: false
						}
					}],
					xAxes: [{
						gridLines: {
							drawBorder: false,
							display: false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});


		var myPieChart = new Chart(pieChart, {
			type: 'pie',
			data: {
				datasets: [{
					data: [<?php echo mysqli_num_rows($lk); ?>, <?php echo mysqli_num_rows($pr); ?>],
					backgroundColor: ["#1F6E8C", "#EA906C"],
					borderWidth: 0
				}],
				labels: ['Laki-Laki', 'Perempuan']
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					position: 'bottom',
					labels: {
						fontColor: 'rgb(154, 154, 154)',
						fontSize: 11,
						usePointStyle: true,
						padding: 20
					}
				},
				pieceLabel: {
					render: 'percentage',
					fontColor: 'white',
					fontSize: 14,
				},
				tooltips: false,
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		})
		var myDoughnutChart = new Chart(doughnutChart, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [<?php echo mysqli_num_rows($komputer); ?>, <?php echo mysqli_num_rows($printer); ?>, ],
					backgroundColor: ['#f3545d', '#1d7af3']
				}],

				labels: [
					'Komputer',
					'Printer'
				]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					position: 'bottom'
				},
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		});
	</script>
</body>

</html>