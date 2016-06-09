<div class="tombol" style="float: right;">
	<a href="<?php echo site_url('cetak-laporan-pemesanan/'.$tgl1."_".$tgl2) ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>
</div>
<br><br><br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" align="center" valign="top">No</th>
			<th rowspan="2" class="text-center" align="center">Blok / No. Rumah</th>
			<th colspan="2" align="center" class="text-center">Type</th>
			<th rowspan="2" class="text-center">Nama Pemesan</th>
			<th rowspan="2" class="text-center">Tanggal Pemesanan</th>
			<th rowspan="2" class="text-center">Status Booking</th>
		</tr>
		<tr>
			<th class="text-center">Luas Bangunan</th>
			<th class="text-center">Luas Tanah</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($laporan as $lap): ?>
			<tr>
				<td align="center"><?php echo $no++ ?></td>
				<td><?php echo strtoupper($lap->nama_kavling) ?></td>
				<td><?php echo $lap->luas_bangun ?>m<sup>2</sup></td>
				<td><?php echo $lap->luas_tanah ?> m<sup>2</sup></td>
				<td><?php echo ucwords($lap->nama) ?></td>
				<td><?php echo $this->idn_time->tgl_db($lap->tgl_pemesanan) ?></td>
				<td><?php echo ucwords($lap->status) ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>