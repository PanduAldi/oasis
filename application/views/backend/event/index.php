<!-- Jquery sctipt -->

<script>
		
		$(function(){

			$(".hapus").click(function(){
				var kode = $(this).attr('kode');
				$("#id_delete").val(kode);
				$("#modal-delete").modal("show");
			});

			$("#konfirmasi").click(function(){
				var kode = $("#id_delelte").val();

				$.ajax({
					url : "<?php echo site_url('event/hapus') ?>",
					type : "POST",
					data : { id : kode},
					success : function()
					{
						location.reload();
					}
				})
			});

			$("#alert").delay(2000).fadeOut(500);
		})

</script>
<!-- End  -->
<div class="row">
	<div class="col-lg-3">
		<div class="alert alert-info">
			Halaman ini untuk mengelola data Event/Kegiatan/Acara untuk di publikasi di website D'OASIS Residence. Untuk menambahkan data Event silahkan klik tombol Tambah data.
		</div>	
	</div>
	<div class="col-lg-9">
		<div class="well well-sm">
			<div id="alert">	
				<?php echo $this->session->flashdata('sukses'); ?>
			</div>
			<a href="<?php echo site_url('event/tambah_data') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
		</div>
		<div class="data">

			<div class="table-responsive">
				<table class="table table-bordered" id="datatable">
					<thead>
						<tr>
							<th>Kode Event</th>
							<th>Event</th>
							<th>Tanggal Publish</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_event as $ev): ?>
							<tr>
								<td><?php echo $ev->kd_event ?></td>
								<td><a href="<?php echo site_url('event/detail/'.$ev->kd_event) ?>"><?php echo $ev->jenis_event ?></a></td>
								<td><?php echo $ev->t_publish ?></td>
								<td>
									<a href="<?php echo site_url('event/edit/'.$ev->kd_event) ?>" class="label label-primary"><i class="fa fa-edit"></i> Edit</a>
									<a href="javascript:void(0)" class="label label-danger hapus" kode="<?php echo $ev->kd_event ?>"><i class="fa fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>		
	</div>
</div>