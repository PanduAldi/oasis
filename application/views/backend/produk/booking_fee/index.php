<!-- Jquery Script -->
<script>
	
	$(function(){

		//validasi dan simpan data
		$("#form_booking").validate({

			rules : {

				"booking_fee" : {
					required : true,
					number : true
				},

				"kd_periode" : "required"
			},

			messages : { 
				booking_fee : {
					required : '<div class="text-danger" data-animate="fadeInLeft">Data Harus di isi</div>',
					number : '<div class="text-danger" data-animate="fadeInLeft">Hanya memperbolehkan angka</div>'
				},

				kd_periode : {
					required : '<div class="text-danger" data-animate="fadeInLeft">Data Harus di isi</div>'
				}
			},

			submitHandler : function(){
				
					var kd_booking = $("#kd_booking").val();
					var kd_periode    = $("#kd_periode").val();
					var booking_fee = $("#booking_fee").val();

					$.ajax({
						url : "<?php echo site_url('booking-fee/tambah_data') ?>",
						type : "POST",
						data : {
							kd_booking : kd_booking,
							kd_periode  : kd_periode,
							booking_fee : booking_fee
						},
						cache : false,
						success : function(msg){
							ex = msg.split("|");

							$("#kd_booking").val(ex[0]);
							$("#kd_periode").val("");
							$("#booking_fee").val("");
							//masuk ke table
							var period = ex[1];
							var ket = ex[2];
							$(".tampil_book").append('<tr class="id_'+kd_booking+'"> <td>'+kd_booking+'</td> <td>'+booking_fee+'</td> <td>'+period+' ('+ket+')</td> <td><a href="javascript:void(0)" class="btn btn-danger btn-sm hapus" onclick="hapus_data()" kode="'+kd_booking+'"><i class="fa fa-trash"></i></a></td></tr>');
						}

					});					
				
			}
		})

	})

	function hapus_data()
	{
		$(function(){
			var kd_booking = $(".hapus").attr('kode');

				$.ajax({
					url : "<?php echo site_url("booking-fee/hapus") ?>",
					type : "POST",
					cache : false,
					data : { kd_booking : kd_booking },
					success : function(msg){
						$(".id_"+kd_booking).fadeOut(500).remove();
						$("#kd_booking").val(msg);
					}
			})
		})
	}
</script>
<!-- end -->
<div class="row">
	<div class="col-lg-3">
		<?php echo $menu_produk ?>	
	</div>
	<div class="col-lg-9">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Form Booking
					</div>
					<div class="panel-body">
						<form method="post" id="form_booking">
							<div class="form-group">
								<label for="" class="control-label">Kode booking :</label>
								<input type="text" name="kd_booking" id="kd_booking" value="<?php echo $kd_booking ?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Periode :</label>
								<select name="kd_periode" id="kd_periode" class="form-control">
									<option value=""> === Pilih Periode === </option>
									<?php foreach ($periode->result() as $p): ?>
										<option value="<?php echo $p->kd_periode ?>"><?php echo $p->periode." (".$p->keterangan.")" ?></option>	
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Booking fee : </label>
								<div class="input-group">
									<div class="input-group-addon">Rp .</div>
									<input type="text" class="form-control" name="booking_fee" id="booking_fee">
								</div>
							</div>
							<div class="well well-sm">
								<button type="submit" name="simpan" class="btn btn-primary"> Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Tabel Booking
					</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Kode Booking</th>
									<th>Booking Fee</th>
									<th>Periode</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody class="tampil_book">
								<?php if ($data_booking->num_rows() == 0): ?>
									<tr>
										<td colspan="4" align="center"> Data tidak ditemukan ... </td>
									</tr>	
								<?php else: ?>
									<?php foreach ($data_booking->result() as $booking): ?>
										<tr class="id_<?php echo $booking->kd_booking ?>">
											<td><?php echo $booking->kd_booking ?></td>
											<td><?php echo $booking->booking_fee ?></td>
											<th><?php echo $booking->periode." (".$booking->keterangan.")" ?></th>
											<td>
												<a href="javascript:void(0)" onclick="hapus_data()" class="btn btn-danger btn-sm hapus" kode="<?php echo $booking->kd_booking ?>"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>														
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>