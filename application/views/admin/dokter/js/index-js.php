<script>
	$('#table-data').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	});

	$(document).on('click', '.edit', function() {
		let id = $(this).data('id');
		let nama = $(this).data('nama');
		let poli = $(this).data('poli');

		$("#editId").val(id);
		$("#editNama").val(nama);
		$("#editPoli").val(poli);
	});

	$(document).on('click', '.delete', function() {
		let id = $(this).data('id');
		let nama = $(this).data('nama');
		let poli = $(this).data('poli');

		$("#deleteId").val(id);
		$("#deleteNama").val(nama);
		$("#deletePoli").val(poli);
	});
</script>
