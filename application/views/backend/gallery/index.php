<div class="row">
	<div class="col-lg-4">
		<div class="alert alert-info">
			Halaman ini untuk mengelola data Gallery yang ada di website D'OASIS Residence. Untuk menambahkan data berita/artikel silahkan klik tombol Tambah data. Jika anda ingin menambahkan gambar pada setiap gallery klik terlebih dahulu tombol <strong><em>Lihat Gambar</em></strong> yang pada tabel.
		</div>	
	</div>	
	<div class="col-md-8">
		<div class="well well-sm">
			<a href="<?php echo site_url('gallery/tambah_data') ?>" class="btn btn-primary btn-sma"><i class="fa fa-plus"></i> Tambah Data </a>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Gallery</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($gallery as $g): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $g->nama ?></td>
							<th>
								<a href="<?php echo site_url('gallery/edit/'.$g->id_galeri) ?>" class="label label-primary"><i class="fa fa-edit"></i> Edit</a>
								<a href="javascript:void(0)" class="label label-danger  hapus" kode="<?php echo $g->id_galeri ?>"><i class="fa fa-trash"></i> Hapus</a>
								<a href="<?php echo site_url('gallery/detail/'.$g->id_galeri) ?>" class="label label-warning"><i class="fa fa-folder-open"></i> Lihat Gambar</a>
							</th>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>	
	</div>
</div>

<!-- Jquery  -->
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
				url : "<?php echo site_url("gallery/hapus") ?>",
				type : "POST",
				data : {id : kode},
				success : function(){
					location.reload();
				}
			})
		});
	})
</script>