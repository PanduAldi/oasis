<?php  
	echo $this->session->flashdata('kirim-sukses');
?>
<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo $title ?></h2>
			<hr>
			<div class="well well-sm">
				<a href="<?php echo site_url('kirim-keluhan') ?>" class="btn btn-primary"><i class="fa fa-envelope"></i> Kirim Keluhan</a>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover" id="datatable">
					<thead>
						<tr>
							<th>kd Keluhan</th>
							<th>Nama Keluhan</th>
							<th>Tanggal Keluhan</th>
							<th>Keluhan</th>
							<th>Status</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($keluhan as $p): ?>
							<tr>
								<td width="100"><?php echo $p->kd_keluhan ?></td>
								<td><?php echo ucwords($p->nama_keluhan) ?></td>
								<td width="150"><?php echo $this->idn_time->tgl_db($p->tgl_keluhan).", ".$this->idn_time->jam($p->tgl_keluhan) ?></td>
								<td><?php echo $p->keluhan ?></td>
								<td>
									<?php echo ucwords($p->status) ?>
								</td>
								<td width="150">
									<a href="<?php echo site_url('lihat-keluhan/'.$p->kd_keluhan) ?>" class="btn btn-primary" title="Balas">
										<i class="fa fa-reply"></i> Lihat detail Keluhan
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>	<br><br>
			<div class="alert alert-info">
				<i class="fa fa-info-circle"></i> Anda dapat mengirim kami Keluhan untuk pelayanan dan masalah teknis didalam rumah anda (D'OASIS Residence). Silahkan klik kirim keluhan untuk menulis keluhan
			</div>
			<div class="alert alert-danger">
				<i class="fa fa-info-circle"></i> Untuk melihat balasan dari kami. Silahkan Lihat Detail Pesan. Anda juga dapat membalas pesan.
			</div>
			<div class="alert alert-success">
				<i class="fa fa-info-circle"></i> Status keluhan akan kami update sejalan dengan progres keluhan apakah sudah selesai atau belum.
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