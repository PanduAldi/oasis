<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="panel-body">
				<h2><?php echo $title ?></h2>
				<hr>
				<div class="alert alert-info"><i class="fa fa-info-circle"></i> Sebelum anda mengisi form dibawah, pastikan anda sudah mentransfer sejumlah nominal yang sudah ditentukan dimenu data_pemesanan. Booking fee yang anda bayarkan akan kami proses setelah anda mengisi form dibawah. Kami berharap anda telah menyetujui semua persyaratan yang ada pada catatan di menu Produk Kami.</div>
				<form action="" method="POST" id="f_pembayaran" class="form-horizontal">
					<div class="form-group">
						<label for="" class="col-md-3 control-label">ID Pembayaran :</label>
						<div class="col-md-4">
							<input type="text" name="id_pembayaran" class="form-control" value="<?php echo $id_pembayaran ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">ID Pemesanan :</label>
						<div class="col-md-4">
							<input type="text" name="id_pemesanan" class="form-control" readonly value="<?php echo $id_pemesanan ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Nama Bank :</label>
						<div class="col-md-5">
							<input type="text" name="nama_bank" class="form-control" placeholder="Ketik Nama Bank (cth : BRI, BNI, dll)">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Nomor Rekening :</label>
						<div class="col-md-5">
							<input type="text" name="no_rekening" class="form-control" placeholder="Ketik Nomor Rekening">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Atas Nama : </label>
						<div class="col-md-6">
							<input type="text" name="atas_nama" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Jumlah Bayar :</label>
						<div class="col-md-4">
							<div class="input-group">
								<div class="input-group-addon">Rp.</div>
								<input type="text" name="jml_pembayaran" class="form-control">
							</div>
						</div>
					</div>
					<input type="hidden" name="keterangan" value="<?php echo $keterangan->periode." / ".$keterangan->keterangan ?>">
					<div class="form-group">
						<div class="col-md-3">
							<button type="submit" name="pembayaran" class="btn btn-primary">Lanjutkan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>