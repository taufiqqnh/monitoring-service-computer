<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
	echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}
?>
<script>
	$(document).ready(function() {
		$('#tableservice').DataTable();
	});
	$(document).ready(function() {
		$('#tablebatal').DataTable();
	});
</script>

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
							<div class="d-flex align-items-center">
								<h1> Data Service </h1>
								<a class="btn btn-danger btn-round ml-auto" href="service_batal_tabel.php">
									Data Service yang dibatalkan
								</a>
							</div>
						</div>
						<div class="card-body">
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
										$data1 = mysqli_query($koneksi, "SELECT * FROM service JOIN pelanggan on pelanggan.id_pelanggan = service.id_pelanggan WHERE progres IN ('Dalam Antrian') ORDER BY no_service DESC");
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
																					<button type="submit" name="update" id="addRowButton" class="btn btn-primary">Edit</button>
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