<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo $title ?></h2>
			<hr>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID Pmesananan</th>
						<th>Kode Rumah</th>
						<th>Tanggal Pemesanan</th>
						<th>Cara Bayar</th>
						<th>Status</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pemesanan as $p): ?>
						<tr>
							<td><?php echo $p->id_pemesanan ?></td>
							<td><?php echo $p->kd_rumah ?></td>
							<td><?php echo $this->idn_time->tgl_db($p->tgl_pemesanan) ?></td>
							<td>
								<select name="cara_bayar" id="cara_bayar" class="form-control">
									<?php  
										$data = array(
														"" => "-- Pilih Cara bayar --",
														"cash keras" => "Cash Keras",
														"cash bertahap" => "Cash Bertahap",
														"kpr" => "KPR"
													);
										foreach ($data as $key => $value) {
											$selected = ($key == $p->cara_bayar)?"selected":"";
											echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
										}
									?>
								</select>
							</td>
							<td><?php echo $p->status ?></td>
							<td>
								<?php  
									if ($p->cara_bayar == "") 
									{
										echo '<a href="javascript:void(0)" class="btn btn-primary status" kode="'.$p->id_pemesanan.'" disabled="disabled"><i class="fa fa-money"></i> Lanjutkan Ke Pembayaran</a>';
									}
									elseif ($p->status == "sudah dibayar") 
									{
										echo anchor_popup('cetak-kwitansi/'.$p->id_pemesanan, '<i class="fa fa-file-text-o"></i> Lihat Kwitansi', array("width"=>"900","height"=>"900",'class'=> "btn btn-primary",'screenx'=>"250", "screeny"=>"50"));
										?>
										<script>
											$(function(){
												$("#cara_bayar").attr('disabled', 'disabled');
											})
										</script>
										<?php
									}
									else
									{
										echo '<a href="'.site_url('form-pembayaran/'.$p->id_pemesanan).'" class="btn btn-primary status" kode="'.$p->id_pemesanan.'"><i class="fa fa-money"></i> Lanjutkan Ke Pembayaran</a>';
									}
								?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<br>
			<div class="alert alert-info">
				<i class="fa fa-info-circle"></i> Halaman ini merupakan detail dari rumah yang anda booking
			</div>
			<div class="alert alert-success">
				<i class="fa fa-info-circle"></i> Untuk proses selanjutnya silahkan anda melakukan transaksi pembayaran booking fee. Transfer sejumlah booking fee yang tertera di detail produk ke rekening (xxxxxxxxx / a.n xxxxx). Klik tombol <button class="btn btn-primary btn-sm"><i class="fa fa-money"></i> Lanjutkan Ke Pembayaran</button> untuk mengisi form-pembayaran anda. 
			</div>
			<div class="alert alert-warning">
				<i class="fa fa-info-circle"></i> Note : Cara Bayar adalah metode pembayaran dalam pembelian rumah. Cara Bayar bukan pembayaran booking fee. Pada pilihan terdapat 3 metode yaitu <strong>Cash Keras, Cash Bertahap, dan KPR</strong>. Silahkan anda pilih salah satu dari metode tersebut sebelum melanjutkan proses pembayaran booking fee.
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){

		$("#cara_bayar").change(function(){
			var isine = $(this).val();
			var kode = $('.status').attr('kode');

			$.ajax({
				url : "<?php echo site_url('data-pemesanan/cara-bayar') ?>",
				type : "POST",
				data : { cara : isine },
				success : function(msg)
				{
					if (msg == "") 
					{	
						swal("Peringatan", "Harus memilih cara bayar", "error");
						$('.status').attr('disabled', 'disabled');
						$(".status").attr('href', 'javascript:void(0)');
					}
					else
					{
						swal("Berhasil", "Cara bayar berhasil di update", "success");
						$('.status').removeAttr('disabled');
						$('.status').attr('href', "<?php echo site_url('form-pembayaran') ?>/"+kode);
					}
				}
			});
		});
	})
</script>