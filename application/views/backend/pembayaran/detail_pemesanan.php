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
						<td colspan="6"><strong>Data Pemesan</strong></td>
					</tr>
					<tr>
						<td width="120">Nomor KTP</td>
						<td width="10">:</td>
						<td colspan="4"><?php echo $data->no_ktp ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td colspan="4"><?php echo ucwords($data->nama) ?></td>
					</tr>
					<tr>
						<td colspan="6"><strong>Data Rumah</strong></td>
					</tr>					
					<tr>
						<td>Nama kavling</td>
						<td>:</td>
						<td colspan="4"><?php echo ucwords($data->nama_kavling) ?></td>
					</tr>
					<tr>
						<td colspan="6"><strong>Detail Pemesanan</strong></td>
					</tr>
					<tr>
						<td>Tanggal Pesan</td>
						<td>:</td>
						<td colspan="4"><?php  echo ucwords($data->tgl_pemesanan) ?></td>
					</tr>
					<tr>
						<td>Cara Bayar</td>
						<td>:</td>
						<td colspan="4"><?php echo strtoupper($data->cara_bayar) ?></td>
					</tr>
				</table>
		<div class="footer" align="center">
			<small>Sistem Informasi pemasaran perumahan D'OASIS Residence</small>
		</div>
	</div>
</body>
</html>