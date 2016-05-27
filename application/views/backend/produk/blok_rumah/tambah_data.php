<div class="row">
	<div class="col-lg-3">
		<?php echo $menu_produk ?>
	</div>
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="" name="f_blok_rumah" id="f_blok_rumah" method="POST">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="" class="control-label">Kode Blok : </label>
								<input type="text" name="kd_blok" readonly value="<?php echo $kd_blok ?>" class="form-control">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Nama Blok : </label>
								<input type="text" name="nama_blok" maxlength="1" class="form-control text-uppercase">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Luas Bangunan :</label>
								<div class="input-group">
									<input type="text" class="form-control" maxlength="3" name="luas_bangun">
									<div class="input-group-addon">M<sup>2</sup></div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Luas Tanah :</label>
								<div class="input-group">
									<input type="text" class="form-control" maxlength="3" name="luas_tanah">
									<div class="input-group-addon">M<sup>2</sup></div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Muka :</label>
								<div class="input-group">
									<input type="text" maxlength="2" class="form-control" name="muka">
									<div class="input-group-addon">M<sup>2</sup></div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Panjang :</label>
								<div class="input-group">
									<input type="text" maxlength="2" class="form-control" name="panjang">
									<div class="input-group-addon">M<sup>2</sup></div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Gambar :</label>
								<div class="input-group">
									<input type="text" name="gambar" id="gambar" readonly class="form-control">
									<span class="input-group-btn">
										<?php 
										echo anchor_popup('blok_rumah/upload_gambar', 'Upload Gambar', array("class"=>"btn btn-info")); 
										?>
									</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Denah :</label>
								
								<div class="input-group">
									<input type="text" name="denah" id="denah" readonly class="form-control">
									<span class="input-group-btn">
										<?php 
											echo anchor_popup('blok_rumah/upload_denah', 'Upload Denah', array("class"=>"btn btn-info")); 
										?>
									</span>
								</div>								
							</div>
							<div class="form-group">
								<label for="" class="control-label">Kamar Tidur :</label>
								<input type="text" name="kmr_tidur" maxlength="1" class="form-control">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Kamar Mandi :</label>
								<input type="text" name="kmr_mandi" maxlength="1" class="form-control">
							</div>
							
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="" class="control-label">Sertifikat :</label>
								<select name="sertifikat" class="form-control" id="">
									<option value="">== Pilih Sertifikat ==</option>
									<option value="hak milik">Hak Milik</option>
									<option value="hak guna bangun">Hak Guna Bangun</option>
								</select>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Listrik :</label>
								<div class="input-group">
									<input type="text" name="listrik" maxlength="4" class="form-control">
									<div class="input-group-addon">Watt</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Harga :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" class="form-control" maxlength="9" id="harga" name="harga">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Uang Muka :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" class="form-control" id="uang_muka" maxlength="9" name="uang_muka">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">KPR :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" class="form-control" maxlength="9" name="kpr">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">5th :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" maxlength="9" class="form-control" name="5th">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">10th :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" maxlength="9" class="form-control" name="10th">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">15th :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" maxlength="9" class="form-control" name="15th">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Booking Fee :</label>
								<select name="kd_booking" class="form-control">
									<option value="">== Pilih Booking Fee ==</option>
									<?php foreach ($booking_fee->result() as $bok): ?>
										<option value="<?php echo $bok->kd_booking ?>"><?php echo $bok->booking_fee ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Spesifikasi :</label>
								<select name="kd_spesifikasi" class="form-control">
									<option value="">== Pilih Spesifikasi == </option>
									<?php foreach ($spesifikasi as $s): ?>
										<option value="<?php echo $s->kd_spesifikasi ?>"><?php echo $s->kd_spesifikasi." "."Pondasi ".$s->pondasi.", Struktur ".$s->struktur ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
			</div>
			<div class="panel-footer">
				<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
				<a href="<?php echo site_url('blok_rumah') ?>" class="btn btn-default">Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- jQuery script -->
<script>
	
	$(function(){

		//validate
		$("#f_blok_rumah").validate({

			rules : {
				
				"nama_blok" : "required",
				"luas_bangun" : {
					required : true,
					number : true
				},
				"luas_tanah" : {
					required : true,
					number : true
				},
				"muka" : {
					required : true,
					number : true
				},
				"panjang" : {
					required : true,
					number  : true
				},
				"gambar" : "required",
				"denah " : "required",
				"kmr_tidur" :  {
					required : true,
					number : true
 				},
 				"kmr_mandi" :  {
					required : true,
					number : true
 				},
 				"sertifikat": "required",
 				"harga" : {
 					required : true,
 					number : true
 				},
 				"uang_muka" : {
 					required : true,
 					number : true
 				},
 				"kpr" : {
 					required : true,
 					number : true
 				},
 				"5th" : {
 					required : true,
 					number : true
 				},
 				"10th" : {
 					required : true,
 					number : true
 				},
 				"15th" : {
 					required : true,
 					number : true
 				},
 				"kd_spesifikasi" : "required",
 				"kd_booking" : "required"
			}
		});
	})
</script>
<!-- End -->