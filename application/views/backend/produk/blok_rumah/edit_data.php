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
								<label for="" class="control-label">Nama Blok : </label>
								<input type="text" name="nama_blok" maxlength="1" value="<?php echo $blok['nama_blok'] ?>" class="form-control text-uppercase">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Luas Bangunan :</label>
								<div class="input-group">
									<input type="text" class="form-control" maxlength="3" value="<?php echo $blok['luas_bangun'] ?>" name="luas_bangun">
									<div class="input-group-addon">M<sup>2</sup></div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Luas Tanah :</label>
								<div class="input-group">
									<input type="text" value="<?php echo $blok['luas_tanah'] ?>" class="form-control" maxlength="3" name="luas_tanah">
									<div class="input-group-addon">M<sup>2</sup></div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Muka :</label>
								<div class="input-group">
									<input type="text" maxlength="2" value="<?php echo $blok['muka']?>" class="form-control" name="muka">
									<div class="input-group-addon">M<sup>2</sup></div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Panjang :</label>
								<div class="input-group">
									<input type="text" maxlength="2" class="form-control" value="<?php echo $blok['panjang'] ?>" name="panjang">
									<div class="input-group-addon">M<sup>2</sup></div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Gambar :</label>
								<div class="input-group">
									<input type="text" name="gambar" id="gambar" value="<?php echo $blok['gambar'] ?>" readonly class="form-control">
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
									<input type="text" name="denah" value="<?php echo $blok['denah'] ?>" id="denah" readonly class="form-control">
									<span class="input-group-btn">
										<?php
											echo anchor_popup('blok_rumah/upload_denah', 'Upload Denah', array("class"=>"btn btn-info")); 
										?>
									</span>
								</div>								
							</div>
							<div class="form-group">
								<label for="" class="control-label">Kamar Tidur :</label>
								<input type="text" name="kmr_tidur" maxlength="1" class="form-control" value="<?php echo $blok['kmr_tidur'] ?>">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Kamar Mandi :</label>
								<input type="text" value="<?php echo $blok['kmr_mandi'] ?>" name="kmr_mandi" maxlength="1" class="form-control">
							</div>
							
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="" class="control-label">Sertifikat :</label>
								<select name="sertifikat" class="form-control" id="">
									<option value="">== Pilih Sertifikat ==</option>
									<?php  
										$sertifikat = array('hak milik' => "Hak Milik", 'hak guna bangun'=>'Hak Guna bangun');
										foreach ($sertifikat as $key => $value) 
										{
											$selected = ($key == $blok['sertifikat'])?"selected":"";
											echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';	
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Listrik :</label>
								<div class="input-group">
									<input type="text" name="listrik" value="<?php echo $blok['listrik'] ?>" maxlength="4" class="form-control">
									<div class="input-group-addon">Watt</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Harga :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" class="form-control" value="<?php echo $blok['harga'] ?>" maxlength="9" id="harga" name="harga">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Uang Muka :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" class="form-control" id="uang_muka" value="<?php echo $blok['uang_muka'] ?>" maxlength="9" name="uang_muka">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">KPR :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" class="form-control" value="<?php echo $blok['kpr'] ?>" maxlength="9" name="kpr">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">5th :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" maxlength="9" value="<?php echo $blok['5th'] ?>" class="form-control" name="5th">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">10th :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" value="<?php echo $blok['10th'] ?>" maxlength="9" class="form-control" name="10th">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">15th :</label>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" maxlength="9" value="<?php echo $blok['15th'] ?>" class="form-control" name="15th">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Booking Fee :</label>
								<select name="kd_booking" class="form-control">
									<option value="">== Pilih Booking Fee ==</option>
									<?php foreach ($booking_fee->result() as $bok): ?>
										<?php  
											$selected = ($bok->kd_booking == $blok['kd_booking'])?"selected" : "";
										?>
										<option value="<?php echo $bok->kd_booking ?>" <?php echo $selected ?>><?php echo $bok->booking_fee ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Spesifikasi :</label>
								<select name="kd_spesifikasi" class="form-control">
									<option value="">== Pilih Spesifikasi == </option>
									<?php foreach ($spesifikasi as $s): ?>
										<?php  
											$selected = ($s->kd_spesifikasi == $blok['kd_spesifikasi'])?"selected":"";
										?>
										<option value="<?php echo $s->kd_spesifikasi ?>" <?php echo $selected ?>><?php echo $s->kd_spesifikasi." "."Pondasi ".$s->pondasi.", Struktur ".$s->struktur ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
			</div>
			<div class="panel-footer">
				<button type="submit" name="edit" class="btn btn-primary">Edit</button>
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