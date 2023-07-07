<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
	echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}
?>
<script>
	$(document).ready(function() {
		$('#tableharga').DataTable();
	});
</script>

<?php
if (isset($_POST['deleteharga'])) {
	$id_del = $_POST['id_harga'];

	$del = mysqli_query($koneksi, "DELETE FROM harga WHERE id_harga='$id_del'") or die(mysqli_error($koneksi));
	if ($del) {
		echo '<script>alert("Berhasil menghapus data."); document.location="harga.php";</script>';
	} else {
		echo '<div class="alert alert-warning">Gagal melakukan proses hapus data.</div>';
	}
}

?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
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
						<a href="harga.php">Data Harga</a>
					</li>
				</ul>
			</div>

			<!-- Tabel Harga -->
			<div class="row ">
				<div class="col-md-12">
					<div class="card full-height">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h1 class="card-title">Data Harga</h1>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambahharga">
									<i class="fa fa-plus"></i>
									Tambah Data Harga
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="modal fade" id="tambahharga" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header" style="background-color: blue; color:white;">
											<h3 class="modal-title">
												<span class="fw- bold">
													Form</span>
												<span class="fw-light">
													Tambah data Harga
												</span>
											</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<!-- Modal Tambah Data-->
										<div class="modal-body">
											<form action="harga_act.php" method="post">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Jenis</label>
															<input id="jenis" name="jenis" type="text" class="form-control" required autocomplete="off">
															</input>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Kategori</label>
															<select class="form-control input-border-buttom" name="kategori" id="kategori" required>
																<option selected value="">Pilih kategori</option>
																<option value="Komputer">Komputer</option>
																<option value="Printer">Printer</option>
																<option value="Service">Service</option>
															</select>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Type</label>
															<input type="text" class="form-control" name="type" id="type" required autocomplete="off">
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Harga</label>
															<input type="text" class="form-control" name="harga" id="harga" required autocomplete="off">
														</div>
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="update" id="addRowButton" class="btn btn-primary">Add</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
										</div>
									</div>
								</div>
								</form>
								<!-- END Modal Tambah Data-->
							</div>
							<div class="table-responsive">
								<table id="tableharga" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th style="width: 1%">NO</th>
											<th>JENIS</th>
											<th>KATEGORI</th>
											<th>TYPE</th>
											<th>HARGA</th>
											<th style="width: 10%">ACTION</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include '../../koneksi.php';
										$no = 1;
										$data = mysqli_query($koneksi, "SELECT * FROM harga");
										while ($d = mysqli_fetch_array($data)) {
										?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $d['jenis']; ?></td>
												<td><?php echo $d['kategori']; ?></td>
												<td><?php echo $d['type']; ?></td>
												<td>RP. <?php echo number_format($d['harga']) ?>,-</td>
												<td>
													<form action="harga.php" method="post">
														<div class="form-button-action">
															<button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary" data-target="#editharga_<?php echo $d['id_harga']; ?>">
																<i class="fa fa-edit"></i>
															</button>
															<!-- Button trigger modal Hapus-->
															<button type="button" class="btn btn-link btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $d['id_harga']; ?>">
																<i class="fas fa fa-trash"></i>
															</button>

															<!-- Modal Hapus-->
															<div class="modal fade" id="hapusModal<?php echo $d['id_harga']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header" style="background-color: red; color:white;">
																			<h5 class="modal-title" id="exampleModalLongTitle">Hapus data Harga</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form action="harga.php" method="post">
																				<input type="hidden" name="id_harga" value="<?php echo $d['id_harga']; ?>">
																				Apakah kamu yakin ingin menghapus data <b><?php echo $d['jenis']; ?></b>
																		</div>
																		<div class="modal-footer">
																			<input type="submit" name="deleteharga" value="Hapus" class="btn btn-danger"></input>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</form>
							</div>
							<!-- Modal Edit Data-->
							<div class="modal fade" id="editharga_<?php echo $d['id_harga']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header" style=" background-color: blue; color:white;">
											<h3 class="modal-title">
												<span class="fw- bold">
													Form</span>
												<span class="fw-light">
													Edit data Harga
												</span>
											</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="harga_update.php" method="post">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Jenis</label>
															<input type="hidden" name="id_harga" value="<?php echo $d['id_harga']; ?>">
															<input id="jenis" name="jenis" type="text" value="<?php echo $d['jenis']; ?>" class="form-control">
															</input>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Kategori</label>
															<select class="form-control input-border-buttom" name="kategori" id="kategori" required>
																<option selected value="<?php echo $d['kategori']; ?>">Pilih kategori</option>
																<option value="Komputer">Komputer</option>
																<option value="Printer">Printer</option>
																<option value="Service">Service</option>
															</select>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Type</label>
															<input type="text" class="form-control" name="type" id="type" value="<?php echo $d['type']; ?>">
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Harga</label>
															<input type="text" class="form-control" name="harga" id="harga" value="<?php echo $d['harga']; ?>">
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
							</div>
						<?php
										}
						?>
						</td>
						</tr>
						</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Tabel Harga -->
	</div>
</div>
<?php include 'footer.php'; ?>