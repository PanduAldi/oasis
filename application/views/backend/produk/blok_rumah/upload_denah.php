<?php echo $this->session->flashdata('error_img'); ?>
<div class="alert alert-info">
	<i class="fa fa-info"></i> Silahkan pilih gambar kemudian upload.
</div>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<input type="file" name="denah" class="form-control" placeholder="Pilih Gambar" required>
	</div>
	<div class="form-group">
		<button type="submit" name="upload" class="btn btn-primary">Upload</button>
	</div>
</form>
