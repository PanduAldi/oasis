<!-- jQuery  -->

<script>
	$(function(){

		$("#f_edit_user").validate({
			rules : {
				"email" : {
					required  : true,
					email : true
				},
				"username" : {
					required : true,
					maxlength : 10
				}
			},

			messages : {
				"email" : {
					"required" : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>',
					"email" : '<div class="text-danger" data-animate="fadeInLeft">Email tidak valid</div>'
				},
				"username" : {
					"required" : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>',
					"maxlength" : '<div class="text-danger" data-animate="fadeInLeft">Username maksimal 10 huruf</div>'
				}
			}
		});

		$("#f_edit_password").validate({
			rules : {
				"password" : "required",
				"confpassword" : {
					required : true,
					equalTo : "#password"
				}
			},

			messages : {
				"password" : {
					"required" : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>',
				},
				"confpassword" : {
					"required" : '<div class="text-danger" data-animate="fadeInLeft">Tidak boleh kosong</div>',
					"equalTo" : '<div class="text-danger" data-animate="fadeInLeft">Password harus sama</div>'
				}
			}
		});
	})
</script>

<!-- enf -->
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Informasi User
			</div>
			<div class="panel-body">
				<div class="alert alert-info"><i class="fa fa-info"></i> Silahkan isi form di bawah ini jika ingin mengganti Email dan Username.</div>
				<form action="" method="POST" id="f_edit_user">
					<div class="form-group">
						<label for="" class="control-label">ID User :</label>
						<input type="text" name="id_user" value="<?php echo $data->id_user ?>" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Email :</label>
						<input type="text" name="email" value="<?php echo $data->email ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Username :</label>
						<input type="text" name="username" class="form-control" value="<?php echo $data->username ?>">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Tanggal Register :</label>
						<input type="text" name="tgl_register" class="form-control" value="<?php echo $data->tgl_register ?>" readonly>
					</div>
			</div>
			<div class="panel-footer">
				<button type="submit" name="edit_user" class="btn btn-primary">Edit Data</button>
				</form>
			</div>
		</div>	
	</div>
	<div class="col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Ganti Password	
			</div>
			<div class="panel-body">
				<div class="alert alert-info"><i class="fa fa-info"></i> Silahkan isi form di bawah ini jika ingin mengganti password lama.</div>
				<form action="" method="POST" id="f_edit_password">
					<div class="form-group">
						<label for="" class="control-label">Password Baru :</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password Baru">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Ulangi Password :</label>
						<input type="password" name="confpassword" class="form-control" placeholder="Ketik Ulang Password" >
					</div>
			</div>
			<div class="panel-footer">
				<button type="submit" name="edit_password" class="btn btn-primary">Ganti Password</button>
				</form>
			</div>
		</div>		
	</div>
</div>