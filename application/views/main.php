<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('layouts/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<!-- <div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="<?= base_url('assets/admin-lte') ?>/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div> -->

		<?php $this->load->view('layouts/navbar') ?>

		<?php $this->load->view('layouts/sidebar'); ?>


		<div class="content-wrapper">

			<?php $this->load->view('layouts/breadcrumb') ?>

			<section class="content">
				<div class="container-fluid">
					<?php $this->load->view('layouts/alert') ?>
					<?php $this->load->view($content) ?>
				</div>
			</section>

		</div>
		<?php $this->load->view('layouts/footer') ?>

		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>

	<?php $this->load->view('layouts/scripts') ?>

	<?php
	if ($js != "") {
		$this->load->view($js);
	}
	?>
</body>

</html>
