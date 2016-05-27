<!-- Jquey Script -->
<script>
	
	$(function(){

		//validasi
		$("#tambah_berita").validate({
			rules : {

				"judul" : "required",
				"meta_k" : "required",
				"meta_d" : {
					required : true,
					maxlength : 255,
					minlength : 100 
				},
				"desk" : "required",
				"gambar_info" : "required"
			},

			messages : {
				"judul" : {"required" : '<div class="text-danger">judul harus di isi</div>'},
				"meta_d" : {
					"required" : '<div class="text-danger">Harus di isi</div>',
					"minlength" : '<div class="text-danger">Harus lebih dari 100 karakter</div>',
					"maxlength" : '<div class="text-danger">Teks kelebihan. harus kurang dari 255</div>'
				},
				"desk" : {"required" : '<div class="text-danger">deksripsi harus di isi</div>'},
				"meta_k" : {"required" : '<div class="text-danger">Harus di isi</div>'},
				"gambar_info" : {"required" : '<div class="text-danger">gambar harus ada</div>'}
			}  

		})

		//tags input
		$("#tag").tagsInput({width:'100%'});

	})
</script>

<div class="tambah_event">
	<?php echo $this->session->flashdata('error_img'); ?>
	<form action="" id="tambah_berita" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="" class="control-label">Kd Berita :</label>
			<input type="text" name="kd_info" class="form-control" value="<?php echo $kd_info ?>" readonly="readonly">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Meta Keyword : </label>
			<input type="text" id="tag" name="meta_k" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Meta Description</label>
			<input type="text" name="meta_d" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Judul Berita : </label>
			<input type="text" class="form-control" name="judul">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Deskripsi : </label>
			<textarea name="desk" id="desk" class="form-control" rows="10"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Gambar : </label>
			<input type="file" name="gambar_info" class="form-control">
		</div>
		<div class="well well-sm">
			<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('berita') ?>" class="btn btn-default">Batal</a>
		</div>
		</form>
</div>