<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<style>
		*{
			margin: 0; padding: 0;
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
	<h4 align="center"><u>SURAT PEMESANAN PEMBELIAN RUMAH </u><br>PERUMAHAN D'OASIS RESIDENCE</h4>
	<br><br>
	<div class="content">
		<p align="justify"><small>Kami yang bertandatangan dibawah ini (pembeli) menegaskan keinginan kami untuk membeli satuan Rumah/kavling di Perumahan D'OASIS Residence Pulosari Brebes dengan syarat-syarat dan ketentuan sebagaimana diuraikan dalam surat pesanan pembelian ini dan dalam perjanjian pengikatan Jual Beli serta dalam perjanjian perjanjian-perjanjian dan dokumen lain yang terkait yang disiapkan oleh PT. Berkah Esa Sejahtera yang bersifat standar yang telah kami ketahui/paham/sepenuhnya.</small></p>
		<br><br>	
		<table class="table table-bordered table-header">
			<tr>
				<th align="center"><strong>IDENTITAS PEMBELI</strong></th>
				<th align="center"><strong>RINCIAN HARGA</strong></th>
			</tr>
			<tr>
				<td>
					<small>
						Saya yang bertanda tangan dibawah ini :
						<br><br>
						<strong>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u><?php echo ucwords($spr->nama) ?></u>
						<br><br>
						<strong>Nomor KTP/SIM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u><?php echo $spr->no_ktp ?></u>
						<br><br>
						<strong>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u><?php echo ucwords($spr->alamat) ?></u>
						<br><br>
						<strong>Telp / HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u><?php echo ucwords($spr->telp) ?></u>

					</small>
				</td>
				<td valign="top">
					<small>
						<strong>Harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u>Rp. <?php echo number_format($spr->harga, 0, ",",".") ?></u>
						<br><br>
						<strong>Tanda Jadi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u>Rp. <?php echo number_format($spr->jml_pembayaran, 0, ",",".") ?></u>
						<br><br>
						<strong>Sisa Hutang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u>Rp. <?php echo number_format($spr->harga, 0, ",",".") ?></u>
						<br><br>
					</small>
				</td>
			</tr>
			<tr>
				<td align="center"><strong>DATA PRODUK</strong></td>
				<td><strong>Keterangan</strong></td>
			</tr>
			<tr>
				<td>
					<small>
						<strong>Blok / No. Kavling &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u><?php echo  ucwords($spr->nama_kavling) ?></u>
						<br><br>
						<strong>Type Bangunan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u><?php echo $spr->luas_bangun ?></u>
						<br><br>
						<strong>LB / LT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>: <u><?php echo $spr->luas_bangun." m<sup>2</sup> / ".$spr->luas_tanah." m<sup>2</sup>" ?></u>
						<br><br>
					</small>
				</td>
				<td valign="top">
					<small><?php echo $spr->keterangan ?></small>
				</td>
			</tr>
		</table>
		<br>
		<br>
		<small>
			<strong>A. Ongkos-ongkos dan Biaya Pembelian Selain dari Harga Jual</strong>
			<br>
			Harga diatas belum termasuk Biaya Proses KPR Bank.
			<br><br>
			<strong>B. Perjanjian Pengikatan Jual Beli</strong>
			<br>
			Perjanjian pengikatan jual beli akan kami jelaskan setelah pembeli mendatangi kantor pemasaran kami terkait jumlah uang muka yang harus dibayar, serta persyaratan yang harus dipersiapkan. Pembeli hanya diberi waktu 7 hari dari tanggal pemesanan untuk menindak lanjuti pembelian kavling di perumahan D'OASIS Residence (*Jika tidak memungkinkan silahkan hubungi kami terlebih dahulu)
			<br><br>
			<strong>C. Sistem Pembayaran</strong>
			<br>
			Sistem yang dipilih adalah <?php echo strtoupper($spr->cara_bayar) ?>. Tambahan diskon akan diberikan untuk pilihan system pembayaran tertentu, yang besarnya dihitung dari harga jual setelah dikon pada saat penjualan. Tambahan diskon untuk system pembayaran Tunai adalah .... % dan untuk system pembayaran tunai bertahap 3(tiga) bulan .. % serta untuk system tunai bertahap 6(Enam) bulan ...% Pembayaran dengan cek/BilyetGiro, Surat Permohonan Pembelian ini dianggap sah apabila dana efektif telah diterima oleh MITRA LAND GROUP (PT. BERKAH ESA SEJAHTERA).
			<br><br>
			<strong>D. Pembatalan Pembelian</strong>
			<br>
			Apabila pembeli membatalkan pembelian kavling ini dengan alasan apapun, maka uang yang telah dibayarkan tidak dapat dikembalikan dan menjadi milik MITRA LAND GROUP (PT. BERKAH ESA SEJAHTERA).
			<br><br>
			<strong>E. Lain-lain</strong>
			<br>
			Surat Pemesanan Pembelian Rumah ini dapat disimpan pada komputer anda. Data ini akan kami gunakan untuk memproses pemesanan rumah anda.
		</small>
		<br>
		<br>
		<br>
		<br>
		<p align="right">Brebes, <?php echo $this->idn_time->tgl_db($spr->tgl_pembayaran) ?></p>
		<table class="table-ttd">
			<tr>
				<td width="250">MITRA LAND GROUP <br> PT. BERKAH ESA SEJAHTERA</td>
				<td>MARKETING</td>
				<td align="right">PEMBELI</td>
			</tr>

		</table>	
	</div>
</body>
</html>