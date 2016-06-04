 <div class="col-lg-9">
 	<div class="panel panel-default">
 		<div class="panel-body">
 			<div class="alert alert-info" data-animate="fadeInLeft">
 				<?php  
 					if ($this->session->userdata('login_member') == true) 
 					{
 						?>
		 				<i class="fa fa-info-circle"></i> Note : Anda dapat memesan rumah dengan mengklik tombol Booking Rumah ini pada tabel list rumah di bawah.						
 						<?php
 					}
 					else
 					{
 					?>
		 				<i class="fa fa-info-circle"></i> Note : Jika anda ingin memesan rumah secara online. Anda harus terdaftar ke sistem kami dengan cara Klik Register disini yang berada di panel login. Kemudian silahkan login untuk mendapatkan fitur pemesanan online.
 					<?php
 					}
 				?>
 			</div>
 			<div class="detailblok">
 				<div class="row">
 					<div class="col-md-4">
 						<img src="<?php echo base_url('img/rumah/'.$blok['gambar']) ?>" class="img-responsive img-thumbnail" alt=""><br><br>
 						<img src="<?php echo base_url('img/rumah/'.$blok['denah']) ?>" class="img-responsive img-thumbnail" alt="">
 					</div>
 					<div class="col-md-8">
						<div role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Deskripsi Produk</a>
								</li>
								<li role="presentation">
									<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Spesifikasi</a>
								</li>
								<li role="presentation">
									<a href="#catatan" aria-controls="catatan" role="tab" data-toggle="tab">Catatan</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<table class="table table-striped">
										<tr>
											<td width="120">Kode Blok</td>
											<td width="10">:</td>
											<td colspan="4"><?php echo $blok['kd_blok'] ?></td>
										</tr>
										<tr>
											<td>Nama Blok</td>
											<td>:</td>
											<td colspan="4"><?php echo strtoupper($blok['nama_blok']) ?></td>
										</tr>
										<tr>
											<td>Luas Bangunan</td>
											<td>:</td>
											<td colspan="4"><?php echo $blok['luas_bangun'] ?> m<sup>2</sup></td>
										</tr>
										<tr>
											<td>Luas Tanah</td>
											<td>:</td>
											<td colspan="4"><?php echo $blok['luas_tanah'] ?> m<sup>2</sup></td>
										</tr>
										<tr>
											<td>Muka</td>
											<td>:</td>
											<td colspan="4"><?php echo $blok['muka'] ?> m<sup>2</sup></td>
										</tr>
										<tr>
											<td>Panjang</td>
											<td>:</td>
											<td colspan="4"><?php echo $blok['panjang'] ?> m<sup>2</sup></td>
										</tr>
										<tr>
											<td>Kamar Tidur</td>
											<td>:</td>
											<td colspan="4"><?php echo $blok['kmr_tidur'] ?> Kmr</td>
										</tr>
										<tr>
											<td>Kamar Mandi</td>
											<td>:</td>
											<td colspan="4"><?php echo $blok['kmr_mandi'] ?> Kmr</td>
										</tr>
										<tr>
											<td>Sertifikat</td>
											<td>:</td>
											<td colspan="4"><?php echo $blok['sertifikat'] ?></td>
										</tr>
										<tr>
											<td>Listrik</td>
											<td>:</td>
											<td colspan="4"><?php echo $blok['listrik'] ?> Watt</td>
										</tr>
										<tr>
											<td>Harga</td>
											<td>:</td>
											<td colspan="4">Rp. <?php echo number_format($blok['harga'], 0, ".", ",") ?></td>
										</tr>
										<tr>
											<td>Uang Muka</td>
											<td>:</td>
											<td colspan="4">Rp. <?php echo number_format($blok['uang_muka'], 0, ".", ",") ?></td>
										</tr>
										<tr>
											<td>KPR</td>
											<td>:</td>
											<td colspan="4">Rp. <?php echo number_format($blok['kpr'], 0, ".", ",") ?></td>
										</tr>
										<tr>
											<td>5 Tahun</td>
											<td>:</td>
											<td>Rp. <?php echo number_format($blok['5th'], 0, ".", ",") ?></td>

											<td>15 Tahun</td>
											<td>:</td>
											<td>Rp. <?php echo number_format($blok['15th'], 0, ".", ",") ?></td>
										</tr>
										<tr>
											<td>10 Tahun</td>
											<td>:</td>
											<td colspan="4">Rp. <?php echo number_format($blok['10th'], 0, ".", ",") ?></td>			
										</tr>
										<tr>
											<td>Booking Fee</td>
											<td>:</td>
											<td>Rp. <?php echo number_format($blok['booking_fee'], 0, ".", ",") ?></td>
										</tr>
									</table>	
								</div>
								<div role="tabpanel" class="tab-pane" id="tab">
									<table class="table table-striped">	
										<tr>
											<td>Pondasi</td>
											<td>:</td>
											<td><?php echo ucwords($blok['pondasi']) ?></td>
										</tr>
										<tr>
											<td>Struktur</td>
											<td>:</td>
											<td><?php echo ucwords($blok['struktur']) ?></td>
										</tr>
										<tr>
											<td>Dinding</td>
											<td>:</td>
											<td><?php echo ucwords($blok['dinding']) ?></td>
										</tr>
										<tr>
											<td>Atap</td>
											<td>:</td>
											<td><?php echo ucwords($blok['atap']) ?></td>
										</tr>
										<tr>
											<td>lantai Utama</td>
											<td>:</td>
											<td><?php echo ucwords($blok['lantai_utama']) ?></td>
										</tr>
										<tr>
											<td>Lantai Toilet</td>
											<td>:</td>
											<td><?php echo ucwords($blok['lantai_toilet']) ?></td>
										</tr>
										<tr>
											<td>Kusen</td>
											<td>:</td>
											<td><?php echo ucwords($blok['kusen']) ?></td>
										</tr>
										<tr>
											<td>Pintu</td>
											<td>:</td>
											<td><?php echo ucwords($blok['pintu']) ?></td>
										</tr>
										<tr>
											<td>Jendela</td>
											<td>:</td>
											<td><?php echo ucwords($blok['jendela']) ?></td>
										</tr>
										<tr>
											<td>Plafond</td>
											<td>:</td>
											<td><?php echo ucwords($blok['plafond']) ?></td>
										</tr>
										<tr>
											<td>Saniter</td>
											<td>:</td>
											<td><?php echo ucwords($blok['saniter']) ?></td>
										</tr>
										<tr>
											<td>Carport</td>
											<td>:</td>
											<td><?php echo ucwords($blok['carport']) ?></td>
										</tr>
									</table>
								</div>
								<div role="tabpanel" class="tab-pane" id="catatan">
									<br>
									<h4>Harga Belum Termasuk :</h4>
									<ol>
										<li>Biaya Proses KPR</li>
									</ol>
									<br>
									<h4>Harga Sudah termasuk :</h4>
									<ol>
										<li>Ijin Mendirikan Bangunan (IMB)</li>
										<li></li>
									</ol>
								</div>
							</div>
						</div> 						
 					</div>
 				</div>
 			</div>
 			<hr>
 			<div class="list-rumah">
 				<div class="well well-sm">
 						<h4>List Rumah Blok <?php echo ucwords($blok['nama_blok']) ?></h4>
 				</div>	
 				<div class="">
 					<table class="table table-bordered" id="datatable">
 						<thead>
 							<tr>
 								<th>Kode Rumah</th>
 								<th>Nama Kavling</th>
 								<th>Keterangan</th>
 								<th>Status</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php foreach ($rumah as $r): ?>
 								<tr>
 									<td><?php echo $r->kd_rumah ?></td>
 									<td><?php echo strtoupper($r->nama_kavling) ?></td>
 									<td><?php echo $r->keterangan ?></td>
 									<td>
 										<?php  

 											if ($r->status == "tersedia") 
 											{
 												if ($this->session->userdata('login_member') == true) 
 												{
 													echo '<a href="javascript:void(0)" class="btn btn-primary booking" kode="'.$r->kd_rumah.'">Booking Rumah Ini</a>';
 												}
 												else
 												{
 													echo 'Tersedia';
 												}
 											}
 											else
 											{
 												echo $r->status;
 											}
 										?>
 									</td>
 								</tr>
 							<?php endforeach ?>
 						</tbody>
 					</table>
 				</div>	
 			</div>
		</div>
 	</div>
 </div>


<script>
	$(function(){

		$(".booking").click(function(){
			var kode = $(".booking").attr('kode');

			swal({
				title : "Konfirmasi Pemesanan",
				text  : "Anda akan membooking rumah ini? Klik OK untuk melanjutkan",
				type : "warning",
	 			showCancelButton: true,   
	 			confirmButtonColor: "#DD6B55",   
	 			confirmButtonText: "OK",   
	 			cancelButtonText : "Batal",
	 			closeOnConfirm: false
			},
				function(){
					
					//action
					$.ajax({
						url  : "<?php echo site_url('konfirmasi-pemesanan') ?>",
						type : "POST",
						data : { id : kode },
						success : function()
						{
							location.href = "<?php echo site_url('pemesanan-sukses') ?>";
						}
					})
				}
			);			
		});
		
	})
</script>