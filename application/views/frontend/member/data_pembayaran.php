<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo $title ?></h2>
			<hr>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID Pembayaran</th>
						<th>ID Pemesanan</th>
						<th>Detail Pembayaran</th>
						<th>Tanggal Pembayaran</th>
						<th>Status</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pembayaran as $pem): ?>
						<tr>
							<td><?php echo $pem->id_pembayaran ?></td>
							<td><?php echo $pem->id_pemesanan ?></td>
							<td width="300">
								<label for="">Nama Bank : </label> <?php echo strtoupper($pem->nama_bank) ?><br>
								<label for="">Nomor Rekening :</label> <?php echo $pem->no_rekening ?> <br>
								<label for="">Atas Nama :</label> <?php echo strtoupper($pem->atas_nama) ?>
								<label for="">Jumlah Pembayara : </label> Rp. <?php echo number_format($pem->jml_pembayaran, 0,",",".") ?>
							</td>
							<td><?php echo $this->idn_time->tgl_db($pem->tgl_pembayaran) ?></td>
							<td>
								<?php  
									if ($pem->status == "y") 
									{
										echo "sudah dikonfirmasi";
									}
									else
									{
										echo "belum dikonfirmasi";
									}
								?>
							</td>
							<td>
								<?php  
									if ($pem->status == "y") 
									{
										echo '<a href="'.site_url('cetak-spr/'.$pem->id_pembayaran).'" class="btn btn-primary" target="_blank"><i class="fa fa-file-o"></i> Lihat SPR</a>';
									}
									else
									{
										echo '<a href="javascript:void(0)" class="btn btn-primary" disabled><i class="fa fa-file-o"></i> Lihat SPR</a>';
									}
								?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<br>
			<div class="alert alert-info">
				<i class="fa fa-info-circle"></i> Halaman ini adalah untuk melihat data pembayaran anda. Jika status belum dikonfiramasi oleh kami dalam 1x24 Jam, silahkan hubungi kami di nomor (08xxxxxxxxxx) Atau anda dapat megirim pesan ke kami di menu Pesan. Layanan konfirmasi pembayaran dilakukan pada jam kerja 09.00 - 17.00 WIB 
			</div>
			<div class="alert alert-danger">
				<i class="fa fa-info-circle"></i> Tombol <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-file-o"></i> Lihat SPR</a> Akan aktif dan dapat dilihat jika pembayaran sudah dikonfirmasi oleh kami.
			</div>
		</div>
	</div>
</div>