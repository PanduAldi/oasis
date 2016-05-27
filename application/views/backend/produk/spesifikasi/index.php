<div class="notif">
	<?php echo $this->session->flashdata('info'); ?>
</div>
<div class="row">
	<div class="col-lg-3">
		<?php echo $menu_produk ?>
	</div>
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="well well-sm">
					<a href="<?php echo site_url('spesifikasi/tambah_data') ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data</a>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Kode Spesifikasi</th>
							<th>Spesifikasi Singkat</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							if ($cek_spek == 0) 
							{
								echo "<tr><td colspan='3' align='center'> Data belum ada..!!!</tr>";
							}
							else
							{
								foreach ($spesifikasi as $spek) 
								{
									?>
									<tr>
										<td><?php echo $spek->kd_spesifikasi ?></td>
										<td>
											Pondasi : <?php echo $spek->pondasi ?> <br>
											Struktur : <?php echo $spek->struktur ?> <br>
											Dinding  : <?php echo $spek->dinding ?> <br>
											<a href="<?php echo site_url('spesifikasi/detail/'.$spek->kd_spesifikasi) ?>">Lihat Selengkapnya</a>
										</td>
										<td>
											<div class="btn-group">
											  <a href="#" class="btn btn-default">Action</a>
											  <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
											  <ul class="dropdown-menu">
											    <li><a href="<?php echo site_url('spesifikasi/edit/'.$spek->kd_spesifikasi) ?>"><i class="fa fa-edit"></i> Edit</a></li>
											    <li><a class="hapus" kode="<?php echo $spek->kd_spesifikasi ?>"><i class="fa fa-trash"></i> Hapus</a></li>
											  </ul>
											</div>
										</td>
									</tr>
									<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	
	$(function(){

		$(".notif").delay(2000).fadeOut(500);

		$(".hapus").click(function(){
			var id = $(this).attr('kode');
			var kode = $("#id_delete").val(id);
		
			$("#modal-delete").modal('show');
		});

		$("#konfirmasi").click(function(){

			var id = $("#id_delete").val();

			$.ajax({
				url : "<?php echo site_url('spesifikasi/hapus') ?>",
				type : "POST",
				data : { id_spek : id },
				success : function(){
					location.reload();
				}

			})
		});
	})
</script>