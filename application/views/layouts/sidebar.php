<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="index3.html" class="brand-link">
		<div class="text-center brand-text">
			<h5 class="m-0 p-0">SILAPORS</h5>
		</div>
		<!-- <span class="brand-text font-weight-light">Aplikasi SPP</span> -->
	</a>

	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<li class="nav-item">
					<a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $menu == 'Dashboard' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('admin/dokter') ?>" class="nav-link <?= $menu == 'Dokter' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-user-shield    "></i>
						<p>
							Dokter
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('admin/jadwal') ?>" class="nav-link <?= $menu == 'Jadwal' ? 'active' : '' ?>">
					<i class="nav-icon fas fa-calendar-alt"></i>
						<p>
							Jadwal
						</p>
					</a>
				</li>

			</ul>
		</nav>
	</div>
</aside>
