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
				<div class="well well-sm">
					<a href="<?php echo site_url('produk/tambah_data') ?>" id="tambah_data" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
				</div>
				<div class="tabelnya">
					<table class="table table-bordered table-striped" id="datatable">
						<thead>
							<tr>
								<th>Kode Rumah</th>
								<th>Nama Kavling</th>
								<th>Blok</th>
								<th>Keterangan</th>
								<th>Status</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rumah as $r): ?>
								<tr>
									<td><?php echo $r->kd_rumah ?></td>
									<td><?php echo strtoupper($r->nama_kavling) ?></td>
									<td><?php echo anchor_popup('produk/detail_blok/'.$r->kd_blok, $r->kd_blok, array(
							        	  'width'      => '950',
							              'height'     => '600',
							              'scrollbars' => 'yes',
							              'status'     => 'yes',
							              'screenx'    => '250',
							              'screeny'    => '50'
							            )); ?>
						            </td>
									<td><?php echo $r->keterangan ?></td>
									<td><?php echo $r->status ?></td>
									<td>
										<a href="<?php echo site_url('produk/edit/'.$r->kd_rumah) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
										<a href="javascript:void(0)" class="btn btn-danger btn-sm hapus" kode="<?php echo $r->kd_rumah ?>"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- jQuery Script -->
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
				url : "<?php echo site_url('produk/hapus') ?>",
				type : "POST",
				data : { id : kode },
				success : function(){
					location.reload();
				}
			})
		});

		$("#alert-delete").delay(2000).fadeOut(500);
	})
</script>
