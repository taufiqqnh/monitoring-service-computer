<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
	echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}

// $query = mysqli_query($koneksi, "SELECT max(no_service) as kodeTerbesar FROM service");
// $data = mysqli_fetch_array($query);
// $no_Service = $data['kodeTerbesar'];
// $urutan = (int) substr($no_Service, 3, 3);
// $urutan++;
// $No_Service = sprintf("%03s", $urutan + 1);

?>
<script>
	$(document).ready(function() {
		$('#tableservice').DataTable();
	});
	$(document).ready(function() {
		$('#tablebatal').DataTable();
	});
</script>

<?php
if (isset($_GET['alert'])) {
	if ($_GET['alert'] == "sukses") {

		echo '<script type ="text/JavaScript">';
		echo 'swal({

                title: "Berhasil!",

                text: "Tambah Service Berhasil",

                icon: "success",

                button: true

            });';
		echo '</script>';
	} elseif ($_GET['alert'] == "berhasil") {

		echo '<script type ="text/JavaScript">';
		echo 'swal({

                title: "Berhasil!",

                text: "Update Service Berhasil",

                icon: "success",

                button: true

            });';
		echo '</script>';
	}
}
?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner ">
			<div class="page-header">
				<h4 class="page-title">Data Master</h4>
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
						<a href="#">Data Master</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="service.php">Data Service</a>
					</li>
				</ul>
			</div>

			<!-- Tabel Service -->
			<div class="row ">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambahService">
								<i class="fa fa-plus"></i>
								Tambah Service
							</button>
							<div class="d-flex align-items-center">
								<h1 class="card-title">Data Service</h1>
								<ul class="nav nav-pills nav-secondary ml-auto" id="pills-tab" role="tablist">

									<li class="nav-item">
										<a class="nav-link active" href="service.php" role="tab" aria-controls="pills-home" aria-selected="true">Dalam Antrian</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="service_batal_tabel.php" role="tab" aria-controls="pills-profile" aria-selected="false">Di Batalkan</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal Tambah Data-->
							<div class="modal fade" id="tambahService" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header" style="background-color: blue; color:white;">
											<h3 class="modal-title">
												<span class="fw- bold">
													Form Tambah data service
												</span>
											</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="daftarservice_act.php" method="post">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Nama Pelanggan</label>
															<select class="form-control" name="id_pelanggan" required>
																<?php
																$dataa1 = mysqli_query($koneksi, "SELECT * FROM pelanggan");
																while ($dataa = mysqli_fetch_array($dataa1)) {
																?>
																	<option value="<?php echo $dataa['id_pelanggan']; ?>"><?php echo $dataa['nama']; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="col-md-3 col-sm-3">
															<input type="hidden" class="form-control" name="no_service" id="no_service" value="<?php echo $No_Service ?>" readonly>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Kategori</label>
															<select class="form-control" name="kategori" required>
																<option value="" selected>Pilih Kategori</option>
																<option value="Komputer">Komputer</option>
																<option value="Printer">Printer</option>
															</select>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label class="form-label">Type</label>
															<input type="text" class="form-control" name="type" id="type" autocomplete="off" required>
															<input type="hidden" class="form-control" name="progres" id="progres" value="Dalam Antrian">
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label class="form-label">Keluhan</label>
															<textarea type="text" class="form-control" name="keluhan" id="keluhan" required>
															</textarea>
														</div>
													</div>
												</div>
										</div>
										<div class="modal-footer no-bd">
											<button type="submit" id="addRowButton" class="btn btn-primary">Daftar Service</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							<!-- END Modal Tambah Data-->
							<div class="table-responsive">
								<table id="tableservice" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>NO</th>
											<th>NO SERVICE</th>
											<th>ID PELANGGAN</th>
											<th>NAMA PELANGGAN</th>
											<th>KATEGORI</th>
											<th>TYPE</th>
											<th>KELUHAN</th>
											<th>TANGGAL</th>
											<th style="width: 5%">ACTION</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include '../../koneksi.php';
										$no = 1;
										$data1 = mysqli_query($koneksi, "SELECT * FROM pelanggan");
										$data1 = mysqli_query($koneksi, "SELECT * FROM service JOIN pelanggan on pelanggan.id_pelanggan = service.id_pelanggan WHERE progres IN ('Dalam Antrian') ORDER BY no_service ASC");
										while ($data = mysqli_fetch_array($data1)) {
										?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td>DC00<?php echo $data['no_service']; ?></td>
												<td><?php echo $data['id_pelanggan']; ?></td>
												<td><?php echo $data['nama']; ?></td>
												<td><?php echo $data['kategori']; ?></td>
												<td><?php echo $data['type']; ?></td>
												<td><?php echo $data['keluhan']; ?></td>
												<td><?php echo $data['tanggal']; ?> </td>
												<td>
													<!-- EDIT MEMBER -->
													<div class="form-button-action">
														<button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary" data-original-title="Edit" data-target="#editservice_<?php echo $data['no_service']; ?>">
															<i class="fa fa-edit"></i>
														</button>
														<a class="btn btn-link btn-danger" href="servbatal.php?no_service=<?php echo $data['no_service']; ?>" role="button">
															<i class="fa fa-times"></i>
														</a>

														<!-- Modal Edit Data-->
														<div class="modal fade" id="editservice_<?php echo $data['no_service']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header" style="background-color: blue; color:white;">
																		<h3 class="modal-title">
																			<span class="fw-light">
																				Form Edit data Service
																			</span>
																			<span class="fw- bold">
																				DC00<?php echo $data['no_service']; ?></span>
																		</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<form action="service_update.php" method="post">
																			<form>
																				<div class="row">

																					<input id="no_service" type="hidden" name="no_service" class="form-control" value="<?php echo $data['no_service']; ?>">

																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Nama Pelanggan</label>
																							<input id="nama" type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" readonly>
																						</div>
																					</div>
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Kategori</label>
																							<input id="kategori" type="text" name="kategori" class="form-control" value="<?php echo $data['kategori']; ?>">
																						</div>
																					</div>
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Type</label>
																							<input id="type" type="text" name="type" class="form-control" value="<?php echo $data['type']; ?>">
																						</div>
																					</div>
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Keluhan</label>
																							<input id="keluhan" type="text" name="keluhan" class="form-control" value="<?php echo $data['keluhan']; ?>">
																						</div>
																					</div>
																					<div class="col-md-12">
																						<div class="form-group form-group-default">
																							<label>Progress</label>
																							<select class="form-control input-border-buttom" name="progres" id="progres">
																								<option selected>Dalam Antrian</option>
																								<option value="Proses Pengerjaan">Proses Pengerjaan</option>
																							</select>
																							<input id="keterangan" type="hidden" name="keterangan" class="form-control" value=" ">
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer no-bd">
																					<button type="submit" name="update" id="addRowButton" class="btn btn-primary">Save</button>
																					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																				</div>
																	</div>
																</div>
															</div>
															</form>
															<!-- END Modal Edit Data-->

														<?php
													}
														?>
														</div>
													</div>

												</td>
											</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- End Tabel Service -->
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</div>