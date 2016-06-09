<div class="tombol" style="float: right;">
	<a href="<?php echo site_url('cetak-laporan-konsumen/'.$tgl1."_".$tgl2) ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>
</div>
<br><br><br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor KTP</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Email</th>
			<th>Telp</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($laporan as $lap): ?>
			<tr>
				<td align="center"><?php echo $no++ ?></td>
				<td><?php echo $lap->no_ktp ?></td>
				<td><?php echo ucwords($lap->nama) ?></td>
				<td><?php echo $lap->alamat ?></td>
				<td><?php echo $lap->email ?></td>
				<td><?php echo $lap->telp ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>