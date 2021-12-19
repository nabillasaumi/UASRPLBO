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
					<th>POLI</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($dokter as $k => $v) : ?>
					<tr>
						<td><?= $k + 1 ?></td>
						<td><?= $v['nama'] ?></td>
						<td><?= $v['poli'] ?></td>
						<td>
							<button class="btn btn-success edit" data-toggle="modal" data-target="#modalEdit" data-keyboard="false" data-backdrop="static" data-id="<?= $v['id'] ?>" data-nama="<?= $v['nama'] ?>" data-poli="<?= $v['poli'] ?>">Edit</button>
							<button class="btn btn-danger delete" data-toggle="modal" data-target="#modalDelete" data-keyboard="false" data-backdrop="static" data-id="<?= $v['id'] ?>" data-nama="<?= $v['nama'] ?>" data-poli="<?= $v['poli'] ?>">Hapus</button>
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
						<input type="text" name="nama" class="form-control" placeholder="">
					</div>

					<div class="form-group">
						<label for="">Poli</label>
						<input type="text" name="poli" class="form-control" placeholder="">
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
						<input type="text" name="nama" id="editNama" class="form-control" placeholder="">
					</div>

					<div class="form-group">
						<label for="">Poli</label>
						<input type="text" name="poli" id="editPoli" class="form-control" placeholder="">
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
					<div class="alert alert-danger" role="alert">
						<strong>Apakah anda yakin menghapus data ini?</strong>
					</div>
					<input type="hidden" name="delete" value="delete">
					<input type="hidden" name="id" id="deleteId">
					<div class="form-group">
						<label for="">Nama</label>
						<input disabled type="text" name="nama" id="deleteNama" class="form-control" placeholder="">
					</div>

					<div class="form-group">
						<label for="">Poli</label>
						<input disabled type="text" name="poli" id="deletePoli" class="form-control" placeholder="">
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Ya, Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
