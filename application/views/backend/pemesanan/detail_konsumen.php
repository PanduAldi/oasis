<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- bs 3 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/other-css/united.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
	<!-- data animate -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/data-animate.css">

	<!-- Jquery -->
	<script src="<?php echo base_url() ?>assets/jQuery-2.1.4.min.js"></script>
	<!-- bs script -->
	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="row">
				<table class="table table-striped">
					<tr>
						<td width="120">Nomor KTP</td>
						<td width="10">:</td>
						<td colspan="4"><?php echo $konsumen->no_ktp ?></td>
					</tr>
					<tr>
						<td>Nama/td>
						<td>:</td>
						<td colspan="4"><?php echo ucwords($konsumen->nama) ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td colspan="4"><?php echo ucwords($konsumen->jk) ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td colspan="4"><?php  echo ucwords($konsumen->alamat) ?></td>
					</tr>
					<tr>
						<td>Muka</td>
						<td>:</td>
						<td colspan="4"><?php echo ucwords($konsumen->kota)."/".ucwords($konsumen->provinsi).", ".$konsumen->kode_pos ?></td>
					</tr>
					<tr>
						<td>Telp / HP</td>
						<td>:</td>
						<td colspan="4"><?php echo $konsumen->telp ?> m<sup>2</sup></td>
					</tr>
				</table>
		<div class="footer" align="center">
			<small>Sistem Informasi pemasaran perumahan D'OASIS Residence</small>
		</div>
	</div>
</body>
</html>