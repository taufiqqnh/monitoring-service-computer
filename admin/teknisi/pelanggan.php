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
									Tambah Data
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
															<input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama" />
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Password</label>
															<input type="password" class="form-control" id="password" name="password" required placeholder="Password" />
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>No HP</label>
															<input type="text" class="form-control" id="hp" name="hp" required placeholder="No Hp" />
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Email</label>
															<input type="email" class="form-control" id="email" name="email" required placeholder="Email Address" />
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
															<input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Alamat" />
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
											<th>NAMA</th>
											<th>NO HP</th>
											<th>EMAIL</th>
											<th>JENIS KELAMIN</th>
											<th>ALAMAT</th>
											<th>STATUS</th>
											<th style="width: 10%">ACTION</th>
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
												<td><?php echo $d['nama']; ?></td>
												<td><?php echo $d['hp']; ?></td>
												<td><?php echo $d['email']; ?></td>
												<td><?php echo $d['jk']; ?></td>
												<td><?php echo $d['alamat']; ?></td>
												<td><?php echo $d['status']; ?> </td>
												<td>
													<!-- EDIT MEMBER -->
													<div class="form-button-action">
														<button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary" data-original-title="Edit" data-target="#editpelanggan_<?php echo $d['id_pelanggan']; ?>">
															<i class="fa fa-edit"></i>
														</button>
														<!-- Modal Edit Data-->
														<div class="modal fade" id="editpelanggan_<?php echo $d['id_pelanggan']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header" style="background-color: blue; color:white;">
																		<h3 class="modal-title">
																			<span class="fw- bold">
																				Form</span>
																			<span class="fw-light">
																				Edit data pelanggan
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
																					<div class=" col-sm-12">
																						<div class="form-group form-group-default">
																							<label>No HP</label>
																							<input id="hp" name="hp" type="text" value="<?php echo $d['hp']; ?>" class="form-control">
																						</div>
																					</div>
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Email</label>
																							<input id="email" type="email" name="email" value="<?php echo $d['email']; ?>" class="form-control">
																						</div>
																					</div>
																					<div class="col-md-6 pr-0">
																						<div class="form-group form-group-default">
																							<label>Jenis Kelamin</label>
																							<select class="form-control input-border-buttom" name="jk" id="jk" required>
																								<option selected><?php echo $d['jk']; ?></option>
																								<option value="Laki-laki">Laki-laki</option>
																								<option value="Perempuan">Perempuan</option>
																							</select>
																						</div>
																					</div>
																					<div class="col-md-5 pr-0">
																						<div class="form-group form-group-default">
																							<label>Status</label>
																							<select class="form-control input-border-buttom" name="status" id="status">
																								<option selected><?php echo $d['status']; ?></option>
																								<!-- <option value="Belum Member">Belum Member</option> -->
																								<option value="Member">Member</option>
																							</select>
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
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</div>