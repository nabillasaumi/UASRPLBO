<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layouts/head') ?>

<body>
	<div class="container" style="margin-top: 50px;">
		<div class="row justify-content-center">
			<div class="col-10">
				<div class="card">
					<div class="card-header">
						<h4 class="text-center">Pendaftaran Pasien</h3>
					</div>
					<form action="" method="POST">
						<div class="card-body">
							<h5 class="text-center">Data Diri</h5>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="">No BPJS</label>
										<input type="text" name="bpjs" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Nama Lengkap</label>
										<input type="text" name="nama" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Tanggal Lahir</label>
										<div class="input-group date" id="reservationdate" data-target-input="nearest">
											<input type="text" name="ttl" class="form-control datetimepicker-input" data-target="#reservationdate" />
											<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Alamat KTP</label>
								<textarea class="form-control" name="alamat_ktp" cols="30" rows="3"></textarea>
							</div>

							<div class="form-group">
								<label for="">Nama Dokter : Poli</label>
								<select class="form-control" name="dokter" id="dokter">
									<option>Dr. ABC, SP. KK : Penyakit Kulit dan Kelamin</option>
								</select>
							</div>
							<button type="submit" class="btn btn-primary btn-block mt-4">Daftar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('layouts/scripts') ?>

	<script>
		$('#reservationdate').datetimepicker({
			format: 'DD/MM/YYYY'
		});
		$("#dokter").select2();
	</script>
</body>

</html>
