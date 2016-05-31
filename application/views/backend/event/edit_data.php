<!-- Jquey Script -->
<script>
	
	$(function(){

		//validasi
		$("#edit_event").validate({
			rules : {

				"jenis_event" : "required",
				"deskripsi_singkat" : {
					required : true,
					maxlength : 255,
					minlength : 100 
				},
				"kd_periode" : "required"
			},

			messages : {
				"jenis_event" : {"required" : '<div class="text-danger">jenis event harus di isi</div>'},
				"deskripsi_singkat" : {
					"required" : '<div class="text-danger">deskripsi singkat harus di isi</div>',
					"minlength" : '<div class="text-danger">Harus lebih dari 100 karakter</div>',
					"maxlength" : '<div class="text-danger">Teks kelebihan. harus kurang dari 255</div>'
				},
				"deskripsi" : {"required" : '<div class="text-danger">deksripsi harus di isi</div>'},
				"kd_periode" : {"required" : '<div class="text-danger">periode harus di isi</div>'}
			}  

		})

	})
</script>

<div class="tambah_event">
	<?php echo $this->session->flashdata('error_img'); ?>
	<form action="" id="edit_event" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="" class="control-label">Jenis Event : </label>
			<input type="text" class="form-control" name="jenis_event" value="<?php echo $event->jenis_event ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label"> Deskripsi singkat : </label>
			<input type="text" name="deskripsi_singkat" id="deskripsi_singkat" class="form-control" value="<?php echo $event->deskripsi_singkat ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Deskripsi : </label>
			<textarea name="deskripsi" id="text" class="form-control" rows="10"><?php echo $event->deskripsi ?></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Periode : </label>
			<select name="kd_periode" id="" class="form-control">
				<option value=""> --- Pilih Periode --- </option>
				<?php  
					foreach ($periode->result() as $p) 
					{
						$cek = ($event->kd_periode == $p->kd_periode)?"selected	":"";
						echo "<option value=".$p->kd_periode." ".$cek.">".$p->periode." (".$p->keterangan.")</option>";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Gambar : </label>
			<input type="file" name="img" class="form-control"><br>
			<img src="<?php echo base_url('img/event/'.$event->img) ?>" width="100" height="50" alt="">
		</div>
		<div class="well well-sm">
			<button type="submit" name="edit" class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('event') ?>" class="btn btn-default">Batal</a>
		</div>
		</form>
</div>