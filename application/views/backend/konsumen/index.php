<div class="alert-delete"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nomor KTP</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>Kota</th>
				<th>telp</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($konsumen as $k): ?>
				<tr>
					<td><?php echo $k->id_konsumen ?></td>
					<td><?php echo $k->no_ktp ?></td>
					<td><?php echo ucwords($k->nama) ?></td>
					<td>
						<?php echo ucwords($k->jk) ?>
					</td>
					<td><?php echo $k->alamat ?></td>
					<td><?php echo ucwords($k->kota)."/".ucwords($k->provinsi).", ".$k->kode_pos ?>
					<td><?php echo $k->telp ?></td>
					<td>
						<a href="javascript:void(0)" class="btn btn-danger btn-sm hapus" kode="<?php echo $k->id_konsumen ?>" ><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<script>
	$(function(){

		$(".hapus").click(function(){

			var kode = $(this).attr('kode');
			
			$("#id_delete").val(kode);
			$("#modal-delete").modal("show");
		});

		$("#konfirmasi").click(function(){

			var kode = $("#id_delete").val();

			$.ajax({
				url : "<?php echo site_url('konsumen/hapus') ?>",
				type : "POST",
				data : { id : kode },
				success : function(){
					location.reload();
				} 
			})
		});

		$(".alert-delete").delay(2000).fadeOut(500);
	})
</script>