<div class="tambah_gallery">
	<form action="" method="POST">
		<div class="form-group">
			<label for="" class="control-label">Nama Gallery : </label>
			<input type="text" name="nama" class="form-control" value="<?php echo $gal->nama ?>" required>
			<br>
		</div>
		<div class="form-group">
			<button type="submit" name="edit" class="btn btn-primary"> Simpan</button>
			<a href="<?php echo site_url('gallery') ?>" class="btn btn-default">Batal</a>
		</div>
 	</form>
</div>