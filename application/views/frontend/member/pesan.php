<?php  
	echo $this->session->flashdata('kirim-sukses');
?>
<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo $title ?></h2>
			<hr>
			<div class="well well-sm">
				<a href="<?php echo site_url('kirim-pesan') ?>" class="btn btn-primary"><i class="fa fa-envelope"></i> Kirim Pesan</a>
			</div>
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
									<a href="<?php echo site_url('lihat-pesan/'.$p->kd_pesan) ?>" class="btn btn-primary" title="Balas">
										<i class="fa fa-reply"></i> Lihat Detail Pesan
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>	<br><br>
			<div class="alert alert-info">
				<i class="fa fa-info-circle"></i> Anda dapat mengirim kami pesan untuk menyakan seputar perumahan D'OASIS Residence. Silahkan klik kirim pesan untuk menulis pesan
			</div>
			<div class="alert alert-danger">
				<i class="fa fa-info-circle"></i> Untuk melihat balasan pesan dari kami. Silahkan Lihat Detail Pesan. Anda juga dapat membalas pesan.
			</div>		
		</div>
	</div>
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