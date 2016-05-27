<div class="row">
	<div class="col-lg-3">
		<?php echo $menu_produk ?>
	</div>
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="" method="POST" id="f_rumah">
					<div class="form-group">
						<label for="" class="control-label">Kode Rumah : </label>
						<input type="text" name="kd_rumah" class="form-control" value="<?php echo $kd_rumah ?>" readonly>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Nama Kavling :</label>
						<input type="text" name="nama_kavling" class="form-control text-uppercase">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Blok Rumah : </label>
						<select name="kd_blok" id="" class="form-control">
							<option value=""> == Pilih Blok Rumah == </option>
							<?php foreach ($blok_rumah as $p): ?>
								<option value="<?php echo $p->kd_blok ?>"><?php echo $p->kd_blok." - ".strtoupper($p->nama_blok) ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Keterangan : </label>
						<input type="text" name="keterangan" class="form-control">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Status</label>
						<select name="status" class="form-control" id="">
							<option value="">== Pilih Status == </option>
							<option value="tersedia">Tersedia</option>
							<option value="dipesan">Di Pesan</option>
							<option value="dibooking">Di Booking</option>
							<option value="terjual">Terjual</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
						<a href="<?php echo site_url('produk') ?>" class='btn btn-default'>Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	
	$(function(){

		$("#f_rumah").validate({
			rules : {
				"nama_kavling" : "required",
				"kd_blok" : "required",
				"status" : "required"
			}
		})
	})
</script>