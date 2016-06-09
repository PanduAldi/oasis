<script>
	$(function(){
					//tgl
			$("#tgl1").datepicker({
				format : "yyyy-mm-dd"
			});
			$("#tgl2").datepicker({
				format : "yyyy-mm-dd"
			});

			$("#f_laporan_konsumen").validate({
				rules : {
					"tgl1" : "required",
					"tgl2" : "required"
				},

				messages : {
					"tgl1" : {"required" : '<div class="text-danger" data-animate="fadeInLeft">Tanggal Awal harus di isi</div>'},
					"tgl2" : {"required" : '<div class="text-danger" data-animate="fadeInLeft">Tanggal Akhir harus di isi</div>'}
				},

				submitHandler : function(){
					var tgl1 = $("#tgl1").val();
					var tgl2  = $("#tgl2").val();

					$.ajax({
						url : "<?php echo site_url('laporan-konsumen/data') ?>",
						type : "POST",
						data : { tgl1 : tgl1, tgl2 : tgl2 },
						beforeSend : function(){
							$("#laporan").html('Sedang memuat data ...');
						},
						success : function(msg){
							$("#laporan").html(msg);
						}
					});
				}
			});

	})
</script>
<div class="well well-sm" >
	<label for="">Masukan Rentang Tanggal</label>
	<form class="form-inline" id="f_laporan_konsumen">
	  <div class="form-group">
	    <input type="text" class="form-control" name="tgl1" id="tgl1" placeholder="Tanggal Awal">
	  </div>
	  <div class="form-group">
	    <label for="">S/D</label>
	    <input type="text" class="form-control" name="tgl2" id="tgl2" placeholder="Tanggal Akhir">
	  </div>
	  <div class="form-group">
	  	<button type="submit" class="btn btn-primary" name="simpan">Submit Laporan</button>
	  </div>
	</form>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<div id="laporan"></div>
	</div>
</div>