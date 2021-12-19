<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/admin-lte/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/admin-lte/dist/css/adminlte.min.css') ?>">
	<link rel="shortcut icon" href="<?=base_url('assets/download')?>/logo.png" type="image/x-icon">

	<style>
		.alert ul {
			margin-bottom: 0;
		}

		li p {
			margin: 0;
		}
	</style>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#"><b>SILAPORS</b></a>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Login to start your session</p>

				<?php if ($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-ban"></i> Gagal !</h5>
						<?= $this->session->flashdata('error') ?>
					</div>
				<?php elseif ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible">
						<h5><i class="icon fas fa-check"></i> Berhasil!</h5>
						<?= $this->session->flashdata('success') ?>
					</div>
				<?php endif ?>
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-ban"></i> Gagal !</h5>
						<ul>
							<?php if (form_error('email')) : ?>
								<li><?= form_error('email') ?></li>
							<?php endif; ?>
							<?php if (form_error('password')) : ?>
								<li><?= form_error('password') ?></li>
							<?php endif; ?>
						</ul>
					</div>
				<?php endif; ?>
				<?= form_open_multipart() ?>
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ? set_value('email') : '' ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ? set_value('password') : '' ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
					</div>
				</div>
				<?= form_close() ?>

				<p class="mb-1 mt-4">
					<small>
						email : admin@gmail.com
						<br>
						password : 12345678
					</small>
				</p>

			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="<?= base_url('assets/admin-lte/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/admin-lte/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>
