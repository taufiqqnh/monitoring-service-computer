<?php include 'header.php';
if (empty($_SESSION['name']) or empty($_SESSION['level'])) {
	echo "<script>alert('Maaf, Anda Harus Login Terlebih dahulu! Terimakasih!!');
    document.location='../../admin.php'</script>";
}
?>
<script>
	$(document).ready(function() {
		$('#tablepelanggan').DataTable();
	});
	$(document).ready(function() {
		$('#tableriwayat').DataTable();
	});
</script>

<?php
if (isset($_POST['editstatus'])) {

	$idpelanggan = $_POST['id_pelanggan'];
	$status = $_POST['status'];
	$sql = mysqli_query($koneksi, "UPDATE pelanggan SET status='$status' WHERE id_pelanggan='$idpelanggan'") or die(mysqli_error($koneksi));
	if ($sql) {
		echo '<script>alert("Berhasil menyimpan data."); document.location="pelanggan.php";</script>';
	} else {
		echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
	}
}
?>

<?php
if (isset($_GET['alert'])) {
	if ($_GET['alert'] == "sukses") {

		echo '<script type ="text/JavaScript">';
		echo 'swal({

                title: "Berhasil!",

                text: "Tambah Pelanggan Berhasil",

                icon: "success",

                button: true

            });';
		echo '</script>';
	} elseif ($_GET['alert'] == "berhasil") {

		echo '<script type ="text/JavaScript">';
		echo 'swal({

                title: "Berhasil!",

                text: "Update Pelanggan Berhasil",

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
						<a href="pelanggan.php">Data Pelanggan</a>
					</li>
				</ul>
			</div>
			<div class="row ">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h1 class="card-title">Data Pelanggan</h1>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambahPelanggan">
									<i class="fa fa-plus"></i>
									Tambah Pelanggan
								</button>
							</div>
						</div>
						<div class="card-body">

							<!-- Modal Tambah Data-->
							<div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header" style="background-color: blue; color:white;">
											<h3 class="modal-title">
												<span class="fw- bold">
													Form Tambah data pelanggan
												</span>
											</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="pelanggan_act.php" method="post">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Nama</label>
															<input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama" autocomplete="off" />
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Password</label>
															<input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>No HP</label>
															<input type="text" class="form-control" id="hp" name="hp" required placeholder="No Hp" autocomplete="off" />
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Email</label>
															<input type="email" class="form-control" id="email" name="email" required placeholder="Email Address" autocomplete="off" />
														</div>
													</div>
													<div class="col-md-6 pr-0">
														<div class="form-group form-group-default">
															<label>Jenis Kelamin</label>
															<select class="form-control" name="jk" id="jk" required>
																<option selected value="">Pilih Jenis Kelamin</option>
																<option value="Laki-laki">Laki-laki</option>
																<option value="Perempuan">Perempuan</option>
															</select>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Alamat</label>
															<input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Alamat" autocomplete="off" />
														</div>
														<input type="hidden" class="form-control" id="status" name="status" value="Belum Member">
													</div>
												</div>
										</div>
										<div class="modal-footer no-bd">
											<button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							<!-- END Modal Tambah Data-->

							<div class="table-responsive">
								<table id="tablepelanggan" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th style="width: 1%">NO</th>
											<th>ID</th>
											<th>NAMA</th>
											<th>NO HP</th>
											<th>EMAIL</th>
											<th>JENIS KELAMIN</th>
											<th>ALAMAT</th>
											<th>STATUS</th>
											<th style="width: 60%">ACTION</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include '../../koneksi.php';
										$no = 1;
										$data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
										while ($d = mysqli_fetch_array($data)) {
										?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $d['id_pelanggan']; ?></td>
												<td><?php echo $d['nama']; ?></td>
												<td><?php echo $d['hp']; ?></td>
												<td><?php echo $d['email']; ?></td>
												<td><?php echo $d['jk']; ?></td>
												<td><?php echo $d['alamat']; ?></td>
												<td><?php echo $d['status']; ?></td>
												<td>
													<!-- EDIT MEMBER -->
													<div class="form-button-action">
														<button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary" data-original-title="Edit" data-target="#editpelanggan_<?php echo $d['id_pelanggan']; ?>">
															<i class="fa fa-edit"></i>
														</button>

														<!-- Button trigger status edit-->
														<button type="button" class="btn btn-link btn-warning" data-toggle="modal" data-target="#statusedit<?php echo $d['id_pelanggan']; ?>">
															<i class="fas fa-check-double"></i>
														</button>

														<!-- Modal status edit-->
														<div class="modal fade" id="statusedit<?php echo $d['id_pelanggan']; ?>" tabindex="-1" role="dialog" aria-labelledby="statusedit" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header" style="background-color: Blue; color:white;">
																		<h3 class="modal-title">
																			<span class="fw- bold">
																				Edit Status Pelanggan <?php echo $d['id_pelanggan']; ?>
																			</span>
																		</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<form action="pelanggan.php" method="post">
																			<div class="col-md-12 pr-0">
																				<div class="form-group form-group-default">
																					<input type="hidden" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>">
																					<label>Status</label>
																					<select class="form-control input-border-buttom" name="status" id="status">
																						<option selected value="<?php echo $d['status']; ?>">Pilih Status</option>
																						<option value="Belum Member">Belum Member</option>
																						<option value="Member">Member</option>
																					</select>
																				</div>
																			</div>
																	</div>
																	<div class="modal-footer">
																		<button type="submit" name="editstatus" id="addRowButton" class="btn btn-primary">Save</button>
																	</div>
																</div>
															</div>
														</div>
														</form>

														<!-- Modal Edit Data-->
														<div class="modal fade" id="editpelanggan_<?php echo $d['id_pelanggan']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header" style="background-color: blue; color:white;">
																		<h3 class="modal-title">
																			<span class="fw- bold">
																				Form</span>
																			<span class="fw-light">
																				Edit data pelanggan <?php echo $d['id_pelanggan']; ?>
																			</span>
																		</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<form action="pelanggan_update.php" method="post">
																			<form>
																				<div class="row">
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Nama</label>
																							<input type="hidden" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>">
																							<input id="nama" name="nama" type="text" value="<?php echo $d['nama']; ?>" class="form-control">
																							</input>
																						</div>
																					</div>
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Password</label>
																							<input id="password" type="password" name="password" class="form-control" placeholder="Masukan password kembali" required>
																						</div>
																					</div>
																					<div class=" col-sm-6">
																						<div class="form-group form-group-default">
																							<label>No HP</label>
																							<input id="hp" name="hp" type="text" value="<?php echo $d['hp']; ?>" class="form-control">
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-group form-group-default">
																							<label>Jenis Kelamin</label>
																							<select class="form-control input-border-buttom" name="jk" id="jk" required>
																								<option selected value="<?php echo $d['jk']; ?>">Pilih Jenis Kelamin</option>
																								<option value="Laki-laki">Laki-laki</option>
																								<option value="Perempuan">Perempuan</option>
																							</select>
																						</div>
																					</div>
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Email</label>
																							<input id="email" type="email" name="email" value="<?php echo $d['email']; ?>" class="form-control">
																						</div>
																					</div>

																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Alamat</label>
																							<textarea type="text" class="form-control" name="alamat" id="alamat" value=""> <?php echo $d['alamat']; ?>
																							</textarea>
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
														</div>
													<?php
												}
													?>
													</div>
												</td>
											</tr>
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</div>