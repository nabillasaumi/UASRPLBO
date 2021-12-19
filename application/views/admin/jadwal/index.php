<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-6 my-auto">
				<h3 class="card-title">Data <?= $breadcrumbTitle ?></h3>
			</div>
			<div class="col-6 text-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd" data-keyboard="false" data-backdrop="static">Tambah</button>
			</div>
		</div>
	</div>
	<div class="card-body">

		<table id="table-data" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO</th>
					<th>NAMA</th>
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
						<td><?= $v['hari'] ?></td>
						<td><?= $v['jam'] ?></td>
						<td>
							<button class="btn btn-success edit" data-toggle="modal" data-target="#modalEdit" data-keyboard="false" data-backdrop="static" data-id="<?= $v['id_jadwal'] ?>" data-id_dokter="<?=$v['id_dokter']?>" data-hari="<?= $v['hari'] ?>" data-jam="<?= $v['jam'] ?>">Edit</button>
							<button class="btn btn-danger delete" data-toggle="modal" data-target="#modalDelete" data-keyboard="false" data-backdrop="static" data-id="<?= $v['id_jadwal'] ?>" data-id_dokter="<?=$v['id_dokter']?>" data-hari="<?= $v['hari'] ?>" data-jam="<?= $v['jam'] ?>">Hapus</button>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>



<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah <?= $breadcrumbTitle ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="" method="post">
				<div class="modal-body">
					<input type="hidden" name="add" value="add">

					<div class="form-group">
						<label for="">Nama</label>
						<select class="form-control" name="dokter" id="addDokter">
							<?php foreach ($dokter as $k => $v) : ?>
								<option value="<?= $v['id'] ?>"><?= $v['nama'] . " : " . $v['poli'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
						<label for="">Hari</label>
						<select class="form-control" name="hari" id="addDays">
							<?php foreach ($days as $k => $v) : ?>
								<option value="<?= $v ?>"><?= $v ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="bootstrap-timepicker">
						<div class="form-group">
							<label>Jam</label>
							<div class="input-group date" id="timepicker" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="jam" value="<?= date('H:i') ?>">
								<div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="far fa-clock"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit <?= $breadcrumbTitle ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="" method="post">
				<div class="modal-body">
					<input type="hidden" name="edit" value="edit">
					<input type="hidden" name="id" id="editId">
					<div class="form-group">
						<label for="">Nama</label>
						<select class="form-control" name="dokter" id="editDokter">
							<?php foreach ($dokter as $k => $v) : ?>
								<option value="<?= $v['id'] ?>"><?= $v['nama'] . " : " . $v['poli'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
						<label for="">Hari</label>
						<select class="form-control" name="hari" id="editDays">
							<?php foreach ($days as $k => $v) : ?>
								<option value="<?= $v ?>"><?= $v ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="bootstrap-timepicker">
						<div class="form-group">
							<label>Jam</label>
							<div class="input-group date" id="editTimepicker" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input" data-target="#editTimepicker" name="jam" value="" id="editJam">
								<div class="input-group-append" data-target="#editTimepicker" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="far fa-clock"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Hapus <?= $breadcrumbTitle ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="" method="post">
				<div class="modal-body">
					<input type="hidden" name="delete" value="delete">
					<input type="hidden" name="id" id="deleteId">
					<div class="form-group">
						<label for="">Nama</label>
						<select disabled class="form-control" name="dokter" id="deleteDokter">
							<?php foreach ($dokter as $k => $v) : ?>
								<option value="<?= $v['id'] ?>"><?= $v['nama'] . " : " . $v['poli'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
						<label for="">Hari</label>
						<select disabled class="form-control" name="hari" id="deleteDays">
							<?php foreach ($days as $k => $v) : ?>
								<option value="<?= $v ?>"><?= $v ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="bootstrap-timepicker">
						<div class="form-group">
							<label>Jam</label>
							<div class="input-group date" id="deleteTimepicker" data-target-input="nearest">
								<input disabled type="text" class="form-control datetimepicker-input" data-target="#deleteTimepicker" name="jam" value="" id="deleteJam">
								<div class="input-group-append" data-target="#deleteTimepicker" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="far fa-clock"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>
