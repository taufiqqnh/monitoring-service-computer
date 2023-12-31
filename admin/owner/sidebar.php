<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2 avatar avatar-online">
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
					<a href="teknisi.php">
						<i class="fas fa-user-friends"></i>
						<p>Data Teknisi</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="monitoring_teknisi.php">
						<i class="far fa-chart-bar"></i>
						<p>Monitoring Kerja Teknisi</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="transaksi_service.php">
						<i class="fas fa-money-check"></i>
						<p>Laporan Transaksi</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>