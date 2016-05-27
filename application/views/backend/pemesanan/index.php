<div class="alert-delete"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>ID Pemesanan</th>
				<th>Konsumen</th>
				<th>Kode Rumah</th>
				<th>Tanggal Pemesanan</th>
				<th>Cara Bayar </th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pemesanan as $p): ?>
				<tr>
					<td><?php echo $p->id_pemesanan ?></td>
					<td><?php echo anchor_popup('pemesanan/detail_konsumen/'.$p->id_user, $p->id_user, 0) ?></td>
					<td><?php echo anchor_popup('pemesanan/detail_rumah/'.$p->kd_rumah, $p->kd_rumah, 0) ?></td>
					<td><?php echo $p->tgl_pemesanan ?></td>
					<td><?php echo $p->cara_bayar ?></td>
					<td> <a href="javascript:void(0)" class="btn btn-danger hapus" kode="<?php echo $p->id_pemesanan ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<script>
	$(function(){

		$(".hapus").click(function(){
			var kode  = $(this).attr('kode');
			$("#id_delete").val(kode);
			$('#modal-delete').modal("show");
		});

		$("#konfirmasi").click(function(){
			var kode = $("#id_delete").val();


			$.ajax({
				url : "<?php echo site_url('pemesanan_hapus') ?>",
				type : "POST",
				data  : {id : kode},
				success : function(){
					location.reload();
				}
			})
		});

		$(".alert-delete").delay(2000).fadeOut(500);
	})
</script>