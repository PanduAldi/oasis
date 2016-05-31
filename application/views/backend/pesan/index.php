<div class="alert-delete"></div>
<div class="table-responsive">
	<table class="table table-bordered table-hover" id="datatable">
		<thead>
			<tr>
				<th>kd Pesan</th>
				<th>Tanggal Pesan</th>
				<th>Pesan</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pesan as $p): ?>
				<tr>
					<td width="100"><?php echo $p->kd_pesan ?></td>
					<td width="150"><?php echo $this->idn_time->tgl_db($p->tgl_pesan).", ".$this->idn_time->jam($p->tgl_pesan) ?></td>
					<td><?php echo $p->pesan ?></td>
					<td width="150">
						<a href="<?php echo site_url('pesan/balas/'.$p->kd_pesan) ?>" class="btn btn-primary" title="Balas">
							<i class="fa fa-reply"></i>
							<?php  
								$notif = $this->m_admin->notif_balas_pesan('pesan', $p->kd_pesan);

								if ($notif == "0") 
								{
									echo "";
								}
								else
								{
									echo '<i class="label label-info">'.$notif.'</i>';
								}
							?>
						</a>
						<a href="javascript:void(0)" title="Hapus" class="btn btn-primary hapus" kode="<?php echo $p->kd_pesan?>"><i class="fa fa-trash"></i></a>
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
				url : "<?php echo site_url('pesan/hapus') ?>",
				type : "POST",
				data : { id : kode},
				success : function(){
					location.reload();
				}
			})
		});

		$(".alert-delete").delay(2000).fadeOut(500);
	})
</script>