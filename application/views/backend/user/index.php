<div class="user">
	<div class="well well-sm">
		<a href="<?php echo site_url('user/tambah_data') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah user</a>
	</div>
	<div class="alert-delete">
		<?php echo $this->session->flashdata('hapus_sukses'); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="datatable">
			<thead>
				<tr>
					<th>Id User</th>
					<th>Email</th>
					<th>Username</th>
					<th>Tanggal Register</th>
					<th>Level</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $d): ?>
					<tr>
						<td><?php echo $d->id_user ?></td>
						<td><?php echo $d->email ?></td>
						<td><?php echo $d->username ?></td>
						<td><?php echo $d->tgl_register ?></td>
						<td><?php echo $d->keterangan ?></td>
						<td>
							<a href="javascript:void(0)" class="btn btn-danger btn-sm hapus" kode="<?php echo $d->id_user ?>"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Jquery -->
<script>
	$(function(){

			$(".hapus").click(function(){
				var kode  = $(this).attr('kode');
				$("#id_delete").val(kode);
				$("#modal-delete").modal("show");
			});

			$("#konfirmasi").click(function(){
				var kode = $("#id_delete").val();

				$.ajax({
					url : "<?php echo site_url('user/hapus') ?>",
					type : "POST",
					data : {id : kode},
					success : function(){
						location.reload();
					}
				})
			});

			$(".alert-delete").delay(2000).fadeOut(500);
	})
</script>