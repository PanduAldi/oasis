<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>

	<style>
		.wrapper{
			border : thin black solid;
			border-width: thick;
		}
		.content {
			padding : 1%;
		}
		
		.dari{
			border : thin black solid;
			padding: 8px;
			width: 500px;
		}
		.nominal{
			border : thin black solid;
			padding: 8px;
			width: 200px;
		}

		.kwitansi table>tr>td {
			height: 1px;
		}

	</style>
</head>
<body>
	<div class="wrapper">
		<div class="content">
			<h1 align="center">KWITANSI</h1>
			<table class="table-wrap">
				<tr>
					<td>
						<img src="<?php echo base_url('img/logo_pt.png') ?>" width="50" height="50" alt="">
						<br>
						<strong>PT. BERKAH ESA SEJATERA</strong><br>
						<small>Operasional Office : Jl. Sultan Agung Km. 2,5 Perum D'OASIS Residence <br> Pulosari Brebes BLOK A-03. <br> Telp : (0283) 6172306</small>
						
						<br><br>
						<div class="kwitansi">
							<table class="kwi">
								<tr>
									<td><em>Diterima Dari</em></td>
									<td>:</td>
									<td><p class="dari"><?php echo $kwitansi->nama ?></p></td>
								</tr>
								<tr>
									<td><em>Sebesar</em></td>
									<td>:</td>
									<td><p class="dari"><?php echo ucwords($this->terbilang->nominal($nominal->jml_pembayaran)." Rupiah") ?></p></td>
								</tr>
								<tr>
									<td><em>Untuk Pembayaran</em></td>
									<td>:</td>
									<td><p class="dari"><?php echo "Booking Fee" ?></p></td>
								</tr>
								<tr>
									<td align="right"><em>Rp. </em></td>
									<td></td>
									<td><p class="nominal"><?php echo number_format($nominal->jml_pembayaran, 0,",",".")  ?></p></td>
								</tr>
								<tr>
									<td colspan="3" align="right">Brebes, <?php echo $this->idn_time->tgl_db($nominal->tgl_pembayaran) ?> <br><br>Administrator</td>

								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<br><br>
	<br>
	<div class="wrapper">
		<div>
			<em>Note : Silahkan datang ke kantor pemasaran kami untuk informasi lebih lanjut mengenai rumah yang anda pesan. untuk melihat SPR (Surat Pemesanan Rumah), silahkan pilih menu <data></data> pembayaran pada halaman website.</em>
		</div>
		
	</div>
</body>
</html>