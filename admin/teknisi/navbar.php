<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

	<div class="container-fluid">
		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
			<li class="nav-item toggle-nav-search hidden-caret">
				<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
					<i class="fa fa-search"></i>
				</a>
			</li>
			<li class="nav-item dropdown hidden-caret">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
					<div class="avatar-sm">
						<img src="../assets/img/admin.png" alt="..." class="avatar-img rounded-circle">
					</div>
				</a>
				<ul class="dropdown-menu dropdown-user animated fadeIn">
					<div class="dropdown-user-scroll scrollbar-outer">
						<li>
							<div class="user-box ">
								<div class="avatar-lg">
									<img src="../assets/img/admin.png" alt="image profile" class="avatar-img rounded">
								</div>
								<div class="u-text">
									<h4>
										<?php
										echo $_SESSION['name'];
										?>
									</h4>
									<p class="text-muted">
										<?php
										echo $_SESSION['email'];
										?>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="profile.php">My Profile</a>
							<a class="dropdown-item" href="../../logout.php">Logout</a>
						</li>
					</div>
				</ul>
			</li>
		</ul>
	</div>
</nav>