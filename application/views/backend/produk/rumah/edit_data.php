<div class="row">
	<div class="col-lg-3">
		<?php echo $menu_produk ?>
	</div>
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="" method="POST" id="f_rumah">
					<div class="form-group">
						<label for="" class="control-label">Nama Kavling :</label>
						<input type="text" name="nama_kavling" value="<?php echo $rumah->nama_kavling ?>" class="form-control text-uppercase">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Blok Rumah : </label>
						<select name="kd_blok" id="" class="form-control">
							<option value=""> == Pilih Blok Rumah == </option>
							<?php foreach ($blok->result() as $p): ?>
								<?php  
									$selected = ($p->kd_blok == $rumah->kd_blok)?"selected":"";
								?>
								<option value="<?php echo $p->kd_blok ?>" <?php echo $selected ?> ><?php echo $p->kd_blok." - ".strtoupper($p->nama_blok) ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Keterangan : </label>
						<input type="text" name="keterangan" value="<?php echo $rumah->keterangan ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Status</label>
						<select name="status" class="form-control" id="">
							<option value="">== Pilih Status == </option>
							<?php  
								$ar = array("tersedia"=>"Tersedia", "dipesan" => "Di Pesan", "dibooking"=>"Di Booking", "terjual"=>"Terjual");

								foreach ($ar as $key => $value) 
								{  
									$selected = ($key == $rumah->status)?"selected":"";
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" name="edit" class="btn btn-primary">Simpan</button>
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