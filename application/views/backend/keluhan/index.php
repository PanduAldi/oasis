<div class="alert-delete"></div>
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
						<select name="status" class="form-control status_keluhan" kode="<?php echo $p->kd_keluhan ?>">
							<option value="">Pilih Status Keluhan</option>
							<?php  
								$kel = array(
												"terima" => "Terima",
												"progres" => "Progres",
												"selesai" => "Selesai"
											);

								foreach ($kel as $key => $value) 
								{
									$selected = ($key == $p->status)?"selected":"";
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</td>
					<td width="150">
						<a href="<?php echo site_url('keluhan/balas/'.$p->kd_keluhan) ?>" class="btn btn-primary" title="Balas">
							<i class="fa fa-reply"></i>
							<?php  
								$notif = $this->m_admin->notif_balas_pesan('keluhan', $p->kd_keluhan);

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
						<a href="javascript:void(0)" title="Hapus" class="btn btn-primary hapus" kode="<?php echo $p->kd_keluhan ?>"><i class="fa fa-trash"></i></a>
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
				url : "<?php echo site_url('keluhan/hapus') ?>",
				type : "POST",
				data : { id : kode},
				success : function(){
					location.reload();
				}
			})
		});

		$(".status_keluhan").change(function(){
			var kode = $(this).attr('kode');
			var isi = $(this).val();

			$.ajax({
				url : "<?php echo site_url('keluhan/update_status') ?>",
				type : "POST",
				data : {id : kode, status : isi},
				success : function()
				{
					swal("Sukses", "Update Status Keluhan Berhasil", "success");
				}
			});
		});

		$(".alert-delete").delay(2000).fadeOut(500);
	})
</script>