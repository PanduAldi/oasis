<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- bs 3 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/other-css/united.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
	<!-- data animate -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/data-animate.css">

	<!-- Jquery -->
	<script src="<?php echo base_url() ?>assets/jQuery-2.1.4.min.js"></script>
	<!-- bs script -->
	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
	

	<script>
		
		
			$(function(){

				$("#form_login").submit(function(){
					var username = $('#username').val();
					var password = $("#password").val();

					if (username == "") 
					{
						$(".pesan-error").html('<div class="alert alert-danger" data-animate="fadeInLeft">Username Harap di isi</div>');
					}

					else if (password == "")
					{
						$(".pesan-error").html('<div class="alert alert-danger" data-animate="fadeInLeft">Password Harap di isi</div>');
					}
					else if (username == "" && password == "") 
					{
						$(".pesan-error").html('<div class="alert alert-danger" data-animate="fadeInLeft">Username dan Password harap di isi</div>');

					}
					else
					{
						return true;
					}

					return false;
				})

			})

		
	

	</script>
</head>
<body>
	<div class="container">
		<div class="col-lg-6 col-xs-12" style="margin-top: 3%;margin-left:25%">
			<p align="center"><img src="<?php echo base_url('img/logo.png') ?>" class="img-responsive" width="200" height="200" alt=""></p>
			<div class="pesan-error"></div>
			<?php echo $this->session->flashdata('login_gagal');
				  echo $this->session->flashdata('logout_success');
				 ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-leaf"></i> PANEL LOGIN
				</div>
				<div class="panel-body">
					<form id="form_login" action="<?php echo site_url('panel_login/proses') ?>" method="POST">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-key"></i></span>
								<input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password " />
							</div>
						</div>
						<div class="form-group" align="right">
							<button type="submit" id="masuk" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
						</div>
					</form>
				</div>
			</div>		
			<div class="footer" align="center">
				<small>Sistem Informasi pemasaran perumahan D'OASIS Residence</small>
			</div>
		</div>
	</div>
</body>
</html>