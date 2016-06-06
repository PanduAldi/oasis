<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo $title ?></h2>
			<hr>
			<form action="" method="POST">
				<input type="hidden" name="kd_keluhan" value="<?php echo $kd_keluhan ?>">
				<div class="form-group">
					<label for="" class="control-label">Nama keluhan</label>
					<input type="text" class="form-control" name="nama_keluhan">
				</div>
				<div class="form-group">
					<label for="" class="control-label"> Tulis Pesan</label>
					<textarea name="keluhan" id="text" rows="10"></textarea>
				</div>
				<div class="well well-sm">
					<button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>