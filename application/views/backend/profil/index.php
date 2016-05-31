<div class="row">
	<div class="col-lg-4">
		<div class="alert alert-info">		
			Halaman ini digunakan untuk merubah data profil pada website doasis residence. Klik tombol simpan ketika selesai mengedit data
		</div>
	</div>

	<div class="col-lg-8">
		<form action="<?php echo site_url('update_profil') ?>" id="form_profil" method="POST"> 
			<input type="hidden" name="id_profil" value="<?php echo $profil->id ?>">	
			<div class="form-group">
				<label for="" class="control-label">Judul Profil : </label>
				<input type="text" class="form-control" name="judul" value="<?php echo $profil->nama_info ?>">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Meta Keyword : </label>
				<input type="text" id="tags" name="meta_keyword" class="form-control" value="<?php echo $profil->meta_keyword ?>">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Meta Description :  </label>
				<input type="text" class="form-control" name="meta_deskripsi" placeholder="Masukan meta deskripsi" value="<?php echo $profil->meta_deskripsi ?>">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Isi Profil :</label>
				<textarea name="isi" id="text" cols="30" rows="10"><?php echo $profil->deskripsi ?></textarea>

			</div>
			<div class="form-group">
				<button type="submit" id="simpan" class="btn btn-primary">Simpan</button> <span class="tombol"></span>
			</div>
		</form>
	</div>
</div>
<script>
	
	$(function(){


		$("#form_profil").validate({
			rules : {
				judul : "required",
				meta_keyword : "required",
				meta_description : {
					required :true,
					minlength : 150,
					maxlength : 255
				}
			},
			messages : {
				judul : {
					required : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>'
				},

				meta_keyword : {
					required : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>'
				}, 
				meta_description: {
					required : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>',
					minlength : '<div class="text-danger" data-animate="fadeInLeft">harus lebih dari 150 karakter</div>',
					maxlength : '<div class="text-danger" data-animate="fadeInLeft">maksimal 255 karakter</div>'
				}
			}
		})


		$("#tags").tagsInput({width : '100%'});

		$("#form_profil").submit(function(){
			$(".tombol").html("Sedang memuat perubahan").delay(3000).fadeOut(500);
		});
	})
</script>