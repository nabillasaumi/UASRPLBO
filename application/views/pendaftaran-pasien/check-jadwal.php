<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layouts/head') ?>

<body>
	<div class="container" style="margin-top: 50px;">
		<div class="row justify-content-center">
			<div class="col-10">
				<?php $this->load->view('layouts/alert') ?>
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-6 my-auto">
								<h5 class="">Jadwal Dokter</h3>
							</div>
							<div class="col-6 text-right">
								<a href="<?= base_url('') ?>">
									<button class="btn btn-secondary">Kembali</button>
								</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table id="table-data" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA</th>
									<th>POLI</th>
									<th>HARI</th>
									<th>JAM</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($jadwal as $k => $v) : ?>
									<tr>
										<td><?= $k + 1 ?></td>
										<td><?= $v['nama'] ?></td>
										<td><?= $v['poli'] ?></td>
										<td><?= $v['hari'] ?></td>
										<td><?= $v['jam'] ?></td>
										<td>
											<button class="btn btn-primary daftar" data-toggle="modal" data-target="#modalDaftar" data-keyboard="false" data-backdrop="static" data-id="<?= $v['id_jadwal'] ?>" data-dokter="<?= $v['nama'] ?>" data-poli="<?= $v['poli'] ?>">Daftar Pasien</button>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Daftar -->
	<div class="modal fade" id="modalDaftar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Daftar Pasien</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
					<div class="modal-body">
						<div class="alert alert-primary" role="alert">
							<strong>Pastikan informasi yang Anda inputkan benar!</strong>
						</div>
						<input type="hidden" name="daftar" value="daftar">
						<input type="hidden" name="id" id="id">
						<div class="form-group">
							<label for="">Dokter</label>
							<input disabled type="text" name="dokter" id="dokter" class="form-control">
						</div>

						<div class="form-group">
							<label for="">Poli</label>
							<input disabled type="text" name="poli" id="poli" class="form-control">
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="">No BPJS</label>
									<input type="text" name="bpjs" class="form-control">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="">Nama Pasien</label>
									<input type="text" name="nama" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="">Tempat Lahir</label>
									<input type="text" name="tempat_lahir" id="nama_pasien" class="form-control">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<div class="input-group date" id="reservationdate" data-target-input="nearest">
										<input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate" />
										<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="">Alamat KTP</label>
							<textarea class="form-control" name="alamat" cols="30" rows="3"></textarea>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Daftar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php $this->load->view('layouts/scripts') ?>

	<script>
		$('#reservationdate').datetimepicker({
			format: 'DD/MM/YYYY'
		});



		$('#table-data').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});

		$(document).on('click', '.daftar', function() {
			let id = $(this).data('id');
			let dokter = $(this).data('dokter');
			let poli = $(this).data('poli');

			$("#id").val(id);
			$("#dokter").val(dokter);
			$("#poli").val(poli);
		});
	</script>
</body>

</html>
