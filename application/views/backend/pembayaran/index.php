<div class="alert-confirm"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>ID</th>
				<th>Pemesanan</th>
				<th>Nama Bank</th>
				<th>No. Rek / A.n</th>
				<th>Tanggal Pembayaran</th>
				<th>Jumlah Pembayaran</th>
				<th>Keterangan</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pembayaran as $pem): ?>
				<tr>
					<td><?php echo $pem->id_pembayaran ?></td>
					<td><?php echo anchor_popup('pembayaran/detail_pemesanan/'.$pem->id_pemesanan, $pem->id_pemesanan, 0) ?></td>
					<td><?php echo strtoupper($pem->nama_bank) ?></td>
					<td><?php echo "No : ".$pem->no_rekening."<br> A.n :".ucwords($pem->atas_nama) ?></td>
					<td><?php echo $pem->tgl_pembayaran ?></td>
					<td><?php echo $pem->jml_pembayaran ?></td>
					<td><?php echo $pem->keterangan ?></td>
					<td>
						<?php  
							if ($pem->status == "y") 
							{
								echo anchor_popup('pembayaran/lihat_spr/'.$pem->id_pembayaran, 'Lihat SPR', 0)."<br>";
								echo anchor_popup('pembayaran/kwitansi/'.$pem->id_pembayaran, 'Lihat Kwitansi', 0);
							}
							else
							{
								echo '<a href="javascript:void(0)" class="btn btn-warning btn-sm konfirmasi_pembayaran" kode="'.$pem->id_pembayaran.'">Konfirmasi Pembayaran</a>';
							}
						?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<script>
	$(function(){

		$(".konfirmasi_pembayaran").click(function(){
			var kode = $(this).attr('kode');

			swal({
				title : "Konfirmasi",
				text : "Yakin ingin mengkonfirmasi pembayaran "+kode,
				type : "warning",
				showCancelButton : true,
				confirmButtonColor : "#DD6B55",   
				confirmButtonText: "OK",   
				closeOnConfirm: false	
			},
			function(){
				$.ajax({
					url : "<?php echo site_url('pembayaran/konfirmasi') ?>",
					type : "POST",
					data : {id : kode},
					success : function(){
						swal("Sukses", "Konfirmasi pembayaran berhasil", "success");
						location.reload();
					}
				})
			})
		})
	})
</script>