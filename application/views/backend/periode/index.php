<!-- Jquery Script -->
<script>
	
	$(function(){

		//validasi dan simpan data
		$("#form_periode").validate({

			rules : {

				"periode" : {
					required : true,
					number : true,
					minlength : 4,
					maxlength : 4 
				},

				"keterangan" : "required"
			},

			messages : { 
				periode : {
					required : '<div class="text-danger" data-animate="fadeInLeft">Data Harus di isi</div>',
					number : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh huruf</div>',
					minlength : '<div class="text-danger" data-animate="fadeInLeft">Masukan jumlah angka yang benar. contoh (2016)</div>',
					maxlength : '<div class="text-danger" data-animate="fadeInLeft">Masukan jumlah angka yang benar. contoh (2016)</div>'
				},

				keterangan : {
					required : '<div class="text-danger" data-animate="fadeInLeft">Data Harus di isi</div>'
				}
			},

			submitHandler : function(){
				
					var kd_periode = $("#kd_periode").val();
					var periode    = $("#periode").val();
					var keterangan = $("#keterangan").val();

					$.ajax({
						url : "<?php echo site_url('periode/tambah_data') ?>",
						type : "POST",
						data : {
							kd_periode : kd_periode,
							periode  : periode,
							keterangan : keterangan
						},
						cache : false,
						success : function(msg){
							$("#kd_periode").val(msg);
							$("#periode").val("");
							$("#keterangan").val("");
							//masuk ke table
							$("#tampil_per").append('<tr class="id_'+kd_periode+'"> <td>'+kd_periode+'</td> <td>'+periode+'</td> <td>'+keterangan+'</td> <td><a href="javascript:void(0)" class="btn btn-danger btn-sm hapus" onclick="hapus_data()" kode="'+kd_periode+'"><i class="fa fa-trash"></i></a></td></tr>');
						}

					});					
				
			}
		})

	})

	function hapus_data()
	{
		$(function(){
			var kd_periode = $(".hapus").attr('kode');

				$.ajax({
					url : "<?php echo site_url("periode/hapus") ?>",
					type : "POST",
					cache : false,
					data : { kd_periode : kd_periode },
					success : function(msg){
						$(".id_"+kd_periode).fadeOut(500).remove();
						$("#kd_periode").val(msg);
					}
			})
		})
	}
</script>
<!-- end -->

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					Form Periode
				</div>
				<div class="panel-body">
					<form method="post" id="form_periode">
						<div class="form-group">
							<label for="" class="control-label">Kode Periode :</label>
							<input type="text" name="kd_periode" id="kd_periode" value="<?php echo $kd_periode ?>" class="form-control" readonly="readonly">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Periode :</label>
							<input type="text" name="periode" id="periode" class="form-control" placeholder="Periode tahun">
						</div>
						<div class="form-group">
							<label for="" class="control-label">keterangan : </label>
							<input type="text" name="keterangan" name="keterangan" id="keterangan" class="form-control">
						</div>
						<div class="well well-sm">
							<button type="submit" name="simpan" class="btn btn-primary"> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tabel Periode
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Kode Periode</th>
								<th>Periode</th>
								<th>Keterangan</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody id="tampil_per">
							<?php if ($data_periode->num_rows() == 0): ?>
								<tr>
									<td colspan="4" align="center"> Data tidak ditemukan ... </td>
								</tr>	
							<?php else: ?>
								<?php foreach ($data_periode->result() as $period): ?>
									<tr class="id_<?php echo $period->kd_periode ?>">
										<td><?php echo $period->kd_periode ?></td>
										<td><?php echo $period->periode ?></td>
										<td><?php echo $period->keterangan ?></td>
										<td>
											<a href="javascript:void(0)" onclick="hapus_data()" class="btn btn-danger btn-sm hapus" kode="<?php echo $period->kd_periode ?>"><i class="fa fa-trash"></i></a>
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
