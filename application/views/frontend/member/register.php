<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="alert alert-info" data-animate="fadeInLeft">
				<i class="fa fa-info-circle"></i> Silahkan Lengkapi Form di Bawah ini untuk Registrasi.
			</div>
			<form action="" method="POST" name="f_form_register" class="form-horizontal" id="f_form_register">
				<input type="hidden" name="id_user" value="<?php echo $id_user ?>">
				<input type="hidden" name="id_konsumen" value="<?php echo $id_konsumen ?>">

				<div class="well well-sm"><i class="fa fa-edit"></i> Data Diri :</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Nomor KTP :</label>
					<div class="col-md-4">
						<input type="text" name="no_ktp" class="form-control">	
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Nama Lengkap :</label>
					<div class="col-md-6">
						<input type="text" name="nama" class="form-control">	
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Jenis Kelamin :</label>
					<div class="col-md-4">
						<select name="jk" class="form-control" id="">
							<option value=""> -- Pilih --</option>
							<option value="l">Laki - laki</option>
							<option value="p">Perempuan</option>
						</select>	
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Alamat :</label>
					<div class="col-md-5">
						<textarea name="alamat" id="" class="form-control" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Kota :</label>
					<div class="col-md-4">
						<input type="text" name="kota" class="form-control">	
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Provinsi :</label>
					<div class="col-md-4">
						<input type="text" name="provinsi" class="form-control">	
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Kode Pos :</label>
					<div class="col-md-4">
						<input type="text" name="kode_pos" class="form-control">	
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Telp / HP :</label>
					<div class="col-md-4">
						<input type="text" name="telp" class="form-control">	
					</div>
				</div>
				<div class="well well-sm"><i class="fa fa-edit"></i> Data User :</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Email Anda :</label>
					<div class="col-md-6">
						<input type="text" name="email" class="form-control">	
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Username :</label>
					<div class="col-md-4">
						<input type="text" name="username" class="form-control">	
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Password :</label>
					<div class="col-md-5">
						<input type="password" name="password" id="password" class="form-control">	
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-3">Konfirmasi Password :</label>
					<div class="col-md-5">
						<input type="password" name="conf" class="form-control" placeholder="Masukan Password Yang Sama" >
					</div>
				</div>
				<div class="well">
					<button type="submit" name="register" class="btn btn-primary"><i class="fa fa-edit"></i> Registrasi</button>
					<a href="<?php echo base_url() ?>" class="btn btn-default">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(function(){
		
		$("#f_form_register").validate({
			rules : {

				"no_ktp" : {
					required : true,
					number : true
				},

				"nama" : "required",
				"jk" : "required",
				"alamat" : "required",
				"kota" :  "required",
				"provinsi" : "required",
				"kode_pos" : {
					required  : true,
					number : true,
					maxlength : 5
				},
				"telp" : {
					required  : true,
					number : true,
					maxlength : 12
				},
				"email" : {
					required : true,
					email : true
				},
				"username" : "required",
				"password" : "required",
				"conf" : {
					required : true,
					equalTo : "#password"
				}
			},

			messages : {
				"no_ktp" : {
					"required" : '<div class="text-danger" data-animate="bounceIn">Nomor KTP Harus di isi</div>',
					"number"   : '<div class="text-danger" data-animate="bounceIn">Karakter tidak boleh huruf</div>'
				},
				"nama" : { "required" : '<div class="text-danger" data-animate="bounceIn">Nama Harus di isi</div>' },
				"jk" : {"required" : '<div class="text-danger" data-animate="bounceIn">Jenis Kelamin tidak boleh kosong</div>'},
				"alamat" : {"required" : '<div class="text-danger" data-animate="bounceIn">Alamat Harus di isi</div>'},
				"kota" : {"required" : '<div class="text-danger" data-animate="bounceIn">Nama Kota Harus di isi</div>'},
				"provinsi" : {'required' : '<div class="text-danger" data-animate="bounceIn">Provinsi Harus di isi</div>'},
				"telp" : {
					"required" : '<div class="text-danger" data-animate="bounceIn">Telp Harus di isi</div>',
					"number" : '<div class="text-danger" data-animate="bounceIn">Karakter tidak boleh huruf</div>',
					"maxlength" : '<div class="text-danger" data-animate="bounceIn">Nomor Telp / HP Maksimal 12 Angka</div>'
				},
				"kode_pos" : {
					"required" : '<div class="text-danger" data-animate="bounceIn"></div>',
					"number" : '<div class="text-danger" data-animate="bounceIn">Karakter tidak boleh huruf</div>',
					"maxlength" : '<div class="text-danger" data-animate="bounceIn">Kode Pos Maksimal 5 Angka</div>'
				},
				"email" : {
					"required" : '<div class="text-danger" data-animate="bounceIn">Email harus di isi</div>',
					"email" : '<div class="text-danger" data-animate="bounceIn">Masukan alamat email yang benar</div>'
				},
				"username" : {
					"required" : '<div class="text-danger" data-animate="bounceIn">Username Harus di isi</div>'
				},
				"password" : {"required" : '<div class="text-danger" data-animate="bounceIn">Password Harus di isi</div>'},
				"conf" : {
					"required" : '<div class="text-danger" data-animate="bounceIn">Konfirmasi Password Harus di isi</div>',
					"equalTo" : '<div class="text-danger" data-animate="bounceIn">Password tidak sama</div>'
				}
			}

		})
	})
</script>