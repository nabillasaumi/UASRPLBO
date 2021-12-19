<style>
	.alert ul {
		margin-bottom: 0;
	}

	ul p {
		margin: 0;
		list-style: disc outside none;
		display: list-item;
	}
</style>

<?php if ($this->session->flashdata('success')) : ?>
	<div class="alert alert-success alert-dismissible">
		<h5><i class="icon fas fa-check"></i> Berhasil!</h5>
		<?= $this->session->flashdata('success') ?>
	</div>
<?php elseif ($this->session->flashdata('error')) : ?>
	<div class="alert alert-danger alert-dismissible">
		<h5><i class="icon fas fa-ban"></i> Gagal !</h5>
		<?= $this->session->flashdata('error') ?>
	</div>
<?php elseif ($this->session->flashdata('errors')) : ?>
	<div class="alert alert-danger alert-dismissible">
		<h5><i class="icon fas fa-ban"></i> Gagal !</h5>
		<ul class="m-0">
			<?= $this->session->flashdata('errors') ?>
		</ul>
	</div>
<?php endif ?>

<?php if (validation_errors()) : ?>
	<div class="alert alert-danger alert-dismissible">
		<h5><i class="icon fas fa-ban"></i> Gagal !</h5>
		<ul class="m-0">
			<?php echo validation_errors(); ?>
		</ul>
	</div>
<?php endif; ?>
