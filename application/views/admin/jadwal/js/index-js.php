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

	$('#timepicker').datetimepicker({
		format: 'HH:mm'
	})

	$('#editTimepicker').datetimepicker({
		format: 'HH:mm'
	})

	$("#addDokter").select2({
		templateResult: function(data) {
			let textExplode = data.text.split(" : ");
			let html = jQuery('<div>Dokter: ' + textExplode[0] + '<br>Poli: ' + textExplode[1] + '</div>');
			return html;
		},
	});

	$("#editDokter").select2({
		templateResult: function(data) {
			let textExplode = data.text.split(" : ");
			let html = jQuery('<div>Dokter: ' + textExplode[0] + '<br>Poli: ' + textExplode[1] + '</div>');
			return html;
		},
	});

	$("#deleteDokter").select2({
		templateResult: function(data) {
			let textExplode = data.text.split(" : ");
			let html = jQuery('<div>Dokter: ' + textExplode[0] + '<br>Poli: ' + textExplode[1] + '</div>');
			return html;
		},
	});

	$("#addDays").select2();
	$("#editDays").select2();
	$("#deletetDays").select2();

	$(document).on('click', '.edit', function() {
		let id = $(this).data('id');
		let id_dokter = $(this).data('id_dokter');
		let hari = $(this).data('hari');
		let jam = $(this).data('jam');

		$("#editId").val(id);
		$("#editDokter").val(id_dokter).change();
		$("#editHari").val(hari).change();
		$("#editJam").val(jam);
	});

	$(document).on('click', '.delete', function() {
		let id = $(this).data('id');
		let id_dokter = $(this).data('id_dokter');
		let hari = $(this).data('hari');
		let jam = $(this).data('jam');

		$("#deleteId").val(id);
		$("#deleteDokter").val(id_dokter).change();
		$("#deleteHari").val(hari).change();
		$("#deleteJam").val(jam);
	});
</script>
