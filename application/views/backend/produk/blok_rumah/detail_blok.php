<div class="back">
	<p align="right"> <a href="<?php echo site_url('blok_rumah') ?> "><i class="fa fa-angle-double-left"></i> Kembali</a></p>
</div>
<div class="row">
	<div class="col-lg-7">
		<table class="table table-striped">
			<tr>
				<td width="120">Kode Blok</td>
				<td width="10">:</td>
				<td colspan="4"><?php echo $blok['kd_blok'] ?></td>
			</tr>
			<tr>
				<td>Nama Blok</td>
				<td>:</td>
				<td colspan="4"><?php echo strtoupper($blok['nama_blok']) ?></td>
			</tr>
			<tr>
				<td>Luas Bangunan</td>
				<td>:</td>
				<td colspan="4"><?php echo $blok['luas_bangun'] ?> m<sup>2</sup></td>
			</tr>
			<tr>
				<td>Luas Tanah</td>
				<td>:</td>
				<td colspan="4"><?php echo $blok['luas_tanah'] ?> m<sup>2</sup></td>
			</tr>
			<tr>
				<td>Muka</td>
				<td>:</td>
				<td colspan="4"><?php echo $blok['muka'] ?> m<sup>2</sup></td>
			</tr>
			<tr>
				<td>Panjang</td>
				<td>:</td>
				<td colspan="4"><?php echo $blok['panjang'] ?> m<sup>2</sup></td>
			</tr>
			<tr>
				<td>Kamar Tidur</td>
				<td>:</td>
				<td colspan="4"><?php echo $blok['kmr_tidur'] ?> Kmr</td>
			</tr>
			<tr>
				<td>Kamar Mandi</td>
				<td>:</td>
				<td colspan="4"><?php echo $blok['kmr_mandi'] ?> Kmr</td>
			</tr>
			<tr>
				<td>Sertifikat</td>
				<td>:</td>
				<td colspan="4"><?php echo $blok['sertifikat'] ?></td>
			</tr>
			<tr>
				<td>Listrik</td>
				<td>:</td>
				<td colspan="4"><?php echo $blok['listrik'] ?> Watt</td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td colspan="4">Rp. <?php echo number_format($blok['harga'], 0, ".", ",") ?></td>
			</tr>
			<tr>
				<td>Uang Muka</td>
				<td>:</td>
				<td colspan="4">Rp. <?php echo number_format($blok['uang_muka'], 0, ".", ",") ?></td>
			</tr>
			<tr>
				<td>KPR</td>
				<td>:</td>
				<td colspan="4">Rp. <?php echo number_format($blok['kpr'], 0, ".", ",") ?></td>
			</tr>
			<tr>
				<td>5 Tahun</td>
				<td>:</td>
				<td>Rp. <?php echo number_format($blok['5th'], 0, ".", ",") ?></td>

				<td>15 Tahun</td>
				<td>:</td>
				<td>Rp. <?php echo number_format($blok['15th'], 0, ".", ",") ?></td>
			</tr>
			<tr>
				<td>10 Tahun</td>
				<td>:</td>
				<td colspan="4">Rp. <?php echo number_format($blok['10th'], 0, ".", ",") ?></td>			
			</tr>
			<tr>
				<td>Booking Fee</td>
				<td>:</td>
				<td><?php echo number_format($booking_fee['booking_fee'], 0, ".", ",") ?></td>
			</tr>
			<tr>
				<td>Spesifikasi</td>
				<td>:</td>
				<td colspan="4"><a href="<?php echo site_url('spesifikasi/detail/'.$spesifikasi['kd_spesifikasi']) ?>" target="_blank"><?php echo $spesifikasi['kd_spesifikasi'] ?></a></td>
			</tr>
		</table>
	</div>
	<div class="col-lg-5">
		<div class="form-group">
			<label for="" class="control-label">Gambar Rumah :</label>
			<img src="<?php echo base_url('img/rumah/'.$blok['gambar']) ?>" class="img-responsive img-thumbnail" alt="">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Denah Rumah :</label>
			<img src="<?php echo base_url('img/rumah/'.$blok['denah']) ?>" class="img-responsive img-thumbnail" alt="">
		</div>
	</div>
</div>	