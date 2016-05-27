<!-- Jquey Script -->
<script>
	
	$(function(){

		//validasi
		$("#tambah_event").validate({
			rules : {

				"jenis_event" : "required",
				"deskripsi_singkat" : {
					required : true,
					maxlength : 255,
					minlength : 100 
				},
				"kd_periode" : "required",
				"img" : "required"
			},

			messages : {
				"jenis_event" : {"required" : '<div class="text-danger">jenis event harus di isi</div>'},
				"deskripsi_singkat" : {
					"required" : '<div class="text-danger">deskripsi singkat harus di isi</div>',
					"minlength" : '<div class="text-danger">Harus lebih dari 100 karakter</div>',
					"maxlength" : '<div class="text-danger">Teks kelebihan. harus kurang dari 255</div>'
				},
				"deskripsi" : {"required" : '<div class="text-danger">deksripsi harus di isi</div>'},
				"kd_periode" : {"required" : '<div class="text-danger">periode harus di isi</div>'},
				"img" : {"required" : '<div class="text-danger">gambar harus ada</div>'}
			}  

		})

	})
</script>

<div class="tambah_event">
	<?php echo $this->session->flashdata('error_img'); ?>
	<form action="" id="tambah_event" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="" class="control-label">Kd Event :</label>
			<input type="text" name="kd_event" class="form-control" value="<?php echo $kd_event ?>" readonly="readonly">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Jenis Event : </label>
			<input type="text" class="form-control" name="jenis_event">
		</div>
		<div class="form-group">
			<label for="" class="control-label"> Deskripsi singkat : </label>
			<input type="text" name="deskripsi_singkat" id="deskripsi_singkat" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Deskripsi : </label>
			<textarea name="deskripsi" id="deskripsi" class="form-control" rows="10"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Periode : </label>
			<select name="kd_periode" id="" class="form-control">
				<option value=""> --- Pilih Periode --- </option>
				<?php  
					foreach ($periode->result() as $p) 
					{
						echo "<option value=".$p->kd_periode.">".$p->periode." (".$p->keterangan.")</option>";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Gambar : </label>
			<input type="file" name="img" class="form-control">
		</div>
		<div class="well well-sm">
			<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

		</div>
		</form>
</div>