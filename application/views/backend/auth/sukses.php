<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- bs 3 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/other-css/yeti.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
	<!-- data animate -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/data-animate.css">

	<!-- Jquery -->
	<script src="<?php echo base_url() ?>assets/jQuery-2.1.4.min.js"></script>
	<!-- bs script -->
	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
	

</head>
<body>
	<div class="container">
		<div class="col-lg-6 col-xs-12" style="margin-top: 3%;margin-left:25%">
			<div class="panel panel-success">
				<div class="panel-body">
					<h2 align="center">Login Berhasil !!</h2>
					<p align="center">Hai, <?php echo $username ?>. Anda Login sebagai <?php echo $level ?>
					<br> Klik tombol dibawah ini untuk melajutkan <br><br>
					<a href="<?php echo site_url('dashboard') ?>" class="btn btn-success">Lanjutkan ke dashboard</a>	
					</p>
					
				</div>
			</div>			
			<div class="footer" align="center">
				<small>Sistem Informasi pemasaran perumahan D'OASIS Residence</small>
			</div>
		</div>
	</div>
</body>
</html>