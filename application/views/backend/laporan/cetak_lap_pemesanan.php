<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<style>
		*{
			margin: 2px; padding: 0;
		}

		.content{
			margin-left: 6%;
			margin-right: 6%;
		}

	  .table {
	    border-collapse: collapse !important;
	  }
	  .table td,
	  .table th {
	    background-color: #fff !important;
	    padding: 5pt;
	  }
	  .table-bordered th,
	  .table-bordered td {
	    border: 1px solid black !important;
	  }
	  .table-header{
	  	width : 100%;
	  }
	  .table-ttd{
	  	width: 100%;
	  }

	  .text-center{
	  	text-align: center;
	  }
	</style>
</head>
<body>
	<small>
	<table>
		<tr>
			<td><img src="<?php echo base_url('img/logo_pt.png') ?>" width="50" height="90" alt=""></td>
			<td>
				<strong>PT. BERKAH ESA SEJATERA</strong><br>
				<small>Operasional Office : Jl. Sultan Agung Km. 2,5 Perum D'OASIS Residence <br> Pulosari Brebes BLOK A-03. 
				<br> Telp : (0283) 6172306</small>
			</td>
		</tr>
	</table>
	</small>
	<h4 align="center"><u>LAPORAN PEMESANAN RUMAH </u><br>PERUMAHAN D'OASIS RESIDENCE</h4>
	<br>
	<hr>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th rowspan="2" class="text-center" align="center">No</th>
				<th rowspan="2" class="text-center" align="center">Blok / No. Rumah</th>
				<th colspan="2" align="center" class="text-center">Type</th>
				<th rowspan="2" class="text-center">Nama Pemesan</th>
				<th rowspan="2" class="text-center">Tanggal Pemesanan</th>
				<th rowspan="2" class="text-center">Status Booking</th>
			</tr>
			<tr>
				<th class="text-center">LB</th>
				<th class="text-center">LT</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($laporan as $lap): ?>
				<tr>
					<td align="center"><?php echo $no++ ?></td>
					<td><?php echo strtoupper($lap->nama_kavling) ?></td>
					<td width="40"><?php echo $lap->luas_bangun ?>m<sup>2</sup></td>
					<td width="40"><?php echo $lap->luas_tanah ?> m<sup>2</sup></td>
					<td width="150"><?php echo ucwords($lap->nama) ?></td>
					<td><?php echo $this->idn_time->tgl_db($lap->tgl_pemesanan) ?></td>
					<td><?php echo ucwords($lap->status) ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>	
</body>
</html>