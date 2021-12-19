<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layouts/head') ?>

<body>
	<div class="container" style="margin-top: 125px;">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card">
					<div class="card-header">
						<h3 class="text-center">Pendaftaran Pasien</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12 text-center">
								<a href="<?= base_url('cek-jadwal') ?>">
									<button class="btn btn-primary p-4" style="width: 350px;">
										<h4>Cek Jadwal Dokter</h4>
									</button>
								</a>
								<br>
								<a href="<?= base_url('login') ?>">
									<p class="mt-4">Login (Admin)</p>
								</a>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('layouts/scripts') ?>
</body>

</html>
