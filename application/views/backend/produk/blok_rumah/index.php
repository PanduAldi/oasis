<div class="row">
	<div class="col-lg-3">
		<?php echo $menu_produk ?>
	</div>
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="alert-delete">
					<?php echo $this->session->flashdata('delete_success'); ?>
				</div>
				<div class="well well-sm"><a href="<?php echo site_url('blok_rumah/tambah_data') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a></div>
				<div class="">
					<table class="table table-bordered">
						<thead>
							<tr>
								<?php  
									$header = array('No', 'nama_blok', 'Muka', 'Panjang', 'Harga', '#');
									
									for($i = 0; $i < count($header); $i++)
									{
										echo '<th>'.$header[$i].'</th>';
									}	
								?>
							</tr>
						</thead>
						<tbody>
							<?php  
								$no = 1;

								if ($blok_rumah->num_rows() == 0) 
								{
									echo '<tr><td colspan="6" align="center">Data Tidak Ada ... </td></tr>';
								}
								else
								{
									foreach ($blok_rumah->result() as $b) 
									{
										?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td width="50"> <?php echo  strtoupper( $b->nama_blok)?></td>
											<td><?php echo $b->muka ?> m<sup>2</sup></td>
											<td><?php echo $b->panjang ?> m<sup>2</sup></td>
											<td>Rp. <?php echo  number_format($b->harga, 0, ".", ",")  ?></td>
											<td>
												<div class="btn-group">
												  <a href="#" class="btn btn-default">Action</a>
												  <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
												  <ul class="dropdown-menu">
												    <li><a href="<?php echo site_url('blok_rumah/edit/'.$b->kd_blok) ?>"><i class="fa fa-edit"></i> Edit</a></li>
												    <li><a class="hapus" kode="<?php echo $b->kd_blok ?>"><i class="fa fa-trash"></i> Hapus</a></li>
												    <li><a href="<?php echo site_url('blok_rumah/detail/'.$b->kd_blok) ?>"><i class="fa fa-search-plus"></i> Detail</a></li>
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
				url : "<?php echo site_url('blok_rumah/hapus') ?>",
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