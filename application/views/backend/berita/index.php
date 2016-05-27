<!-- JQUREY Script  -->

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
					url : "<?php echo site_url('berita/hapus') ?>",
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
<!-- end -->
<div class="row">
	<div class="col-lg-4">
		<div class="alert alert-info">
			Halaman ini untuk mengelola dat berita/artikel yang ada di website D'OASIS Residence. Untuk menambahkan data berita/artikel silahkan klik tombol Tambah data.
		</div>	
	</div>
	<div class="col-md-8">
		<div class="alert-delete"><?php echo $this->session->flashdata('sukses'); ?></div>
		<div class="well well-sm">
			<a href="<?php echo site_url('berita/tambah_data') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"> Tambah Data</i></a>
		</div>
		<div class="table-rensposive">
			<table class="table table-bordered table-striped" id="datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>tgl publish</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($berita as $ber): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><a href="<?php echo site_url('berita/detail/'.$ber->id) ?>"><?php echo $ber->nama_info ?></a></td>
							<td><?php echo $ber->tgl_info ?></td>
							<td>
								<a href="<?php echo site_url("berita/edit/".$ber->id) ?>" class="label label-primary"><i class="fa fa-edit"></i> Edit</a>
								<a href="javascript:void(0)" class="label label-danger hapus" kode="<?php echo $ber->id ?>"><i class="fa fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>