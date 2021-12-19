<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">

		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="fa fa-user-circle" aria-hidden="true"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">Akun</span>
				<div class="dropdown-divider"></div>
				<div class="dropdown-divider"></div>
				<a href="<?= base_url('logout') ?>" class="dropdown-item">
					<i class="fas fa-sign-out-alt mr-2"></i>
					Logout
				</a>
			</div>
		</li>

	</ul>
</nav>

