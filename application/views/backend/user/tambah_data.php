<div class="tambah_user">
	<form action="" method="POST" id="tambah_user">
		<div class="form-group">
			<label for="" class="control-label">Id User :</label>
			<input type="text" class="form-control" name="id_user" value="<?php echo $id_user ?>" readonly="">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Email : </label>
			<input type="text" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Username : </label>
			<input type="text" class="form-control" name="username">
		</div> 
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Level :</label>
			<select name="level" id="level" class="form-control">
				<option value=""> == Pilih Level ==</option>
				<option value="1">Administrator</option>
				<option value="2">Marketing</option>
			</select>
			<input type="hidden" class="form-control" id="keterangan" name="keterangan">
		</div>
		<div class="well well-sm">
			<button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
			<a href="<?php echo site_url('user') ?>" class="btn btn-default btn-sm">Batal</a>
		</div>
	</form>
</div>

<script>
	
	$(function(){

		$("#level").change(function(){

			var isi = $(this).val();

			if (isi == "1") 
			{
				$("#keterangan").val("administrator");
				exit();
			}
			else if(isi == "2")
			{
				$("#keterangan").val("marketing");
				exit();
			}
		});

		$("#tambah_user").validate({
			rules : {
				"email" : {
					required : true,
					email : true
				},
				
				"username" : {
					required : true,
					maxlength : 10
				},

				"password" : "required",
				"level" : "required"
			},

			messages : {

				"email" : {
					"required" : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>',
					"email" : '<div class="text-danger" data-animate="fadeInLeft">Masukan email yang valid</div>'
				},

				"username" : {
					"required" : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>',
					"maxlength" : '<div class="text-danger" data-animate="fadeInLeft">Username maksimal 10 huruf</div>'
				},

				"password" : {
					"required" : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>'
				},

				"level" : {
					"required" : '<div class="text-danger" data-animate="fadeInLeft">Level harus di pilih</div>'
				}
			}
		});
	})
</script>