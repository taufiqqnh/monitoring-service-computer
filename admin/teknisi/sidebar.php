<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="../assets/img/admin.png" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?php
							echo $_SESSION['name'];
							?>
							<span class="user-level">
								<?php
								echo $_SESSION['level'];
								?>
							</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="profile.php">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item">
					<a href="index.php">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Menu</h4>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#master">
						<i class="fas fa-table"></i>
						<p>Data Master</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="master">
						<ul class="nav nav-collapse">
							<li>
								<a href="pelanggan.php">
									<span class="sub-item">Data Pelanggan</span>
								</a>
							</li>
							<li>
								<a href="service.php">
									<span class="sub-item">Data Service</span>
								</a>
							</li>
							<li>
								<a href="harga.php">
									<span class="sub-item"> Data Harga</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a href="monitoring_service.php">
						<i class="far fa-chart-bar"></i>
						<p>Monitoring Service</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="transaksi_service.php">
						<i class="fas fa-money-check"></i>
						<p>Transaksi</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Layanan</h4>
				</li>
				<li class="nav-item">
					<a href="layanan.php">
						<i class="fas fa-layer-group"></i>
						<p>Layanan Tersedia</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>