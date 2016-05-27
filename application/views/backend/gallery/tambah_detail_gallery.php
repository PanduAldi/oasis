<div class="tambah_detail_gallery">
	<?php echo $this->session->flashdata('img_error'); ?>
	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="" class="control-label">Nama Gambar : </label>
			<input type="text" class="form-control" name="nama" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Gambar :</label>
			<input type="file" class="form-control" name="gambar">
		</div>
		<div class="form-group">
			<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
			<a onclick="window.history.go(-1)" class="btn btn-default">kembali</a>
		</div>
	</form>
</div>