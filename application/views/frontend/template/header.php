<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- bootstrap style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/other-css/united.css">
	<!-- font awesome  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
	<!-- data-animate -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/data-animate.css">
	<!-- tag input -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery_tag/jquery.tagsinput.min.css">
	<!-- datatables -->
	<link rel="stylesheet" href="<?php echo base_url()  ?>assets/datatables/dataTables.bootstrap.css">
	<!-- Sweet Alert -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/swal/sweetalert.css">

	<style>
		html {
		  position: relative;
		  min-height: 100%;
		}
		body {
		  /* Margin bottom by footer height */
		  background:url("<?php echo base_url() ?>/img/background.jpg")no-repeat center center fixed;
		  margin-bottom: 60px;
		}

		.ukuran {
			height : 453px;
		}

		.footer {
		  position: absolute;
		  bottom: 0;
		  width: 100%;
		  /* Set the fixed height of the footer here */
		  height: 70px;
		  background-color: #e6e6e6;
		}
	</style>


	<!-- Jquery  -->
	<script src="<?php echo base_url() ?>assets/jQuery-2.1.4.min.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Facebook Plugin -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.6&appId=559696837515393";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="header">
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo site_url('home') ?>">D'OASIS RESIDENCE</a>
				</div>

			</div>
		</nav>
	</div>
	
	<!-- wrapper -->
	<div class="container">
		<div class="header">
			<img src="<?php echo base_url('img/logo.png') ?>" width="200" height="200" class="img-responsive" alt="">
		</div>
		<div class="navigasi">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">Menu</a>
					<ul class="nav navbar-nav">
						<li>
							<a href="<?php echo site_url('home') ?>"><i class="fa fa-home"></i> Home</a>
						</li>
						<li>
							<a href="<?php echo site_url('profil-kami') ?>"><i class="fa fa-building"></i> Profil</a>
						</li>
						<li>
							<a href="<?php echo site_url('produk-kami') ?>"><i class="fa fa-list"></i> Produk Kami</a>
						</li>
						<li>
							<a href="<?php echo site_url('berita-property') ?>"><i class="fa fa-newspaper-o"></i> Berita Properti</a>
						</li>
						<li>
							<a href="<?php echo site_url('event-kami') ?>"><i class="fa fa-bullhorn"></i> Event Kami</a>
						</li>
						<li>
							<a href="<?php echo site_url('galeri-foto') ?>"><i class="fa fa-photo"></i> Galeri</a>
						</li>
						<li>
							<a href="<?php echo site_url('kontak-kami') ?>"><i class="fa fa-phone"></i> Kontak Kami</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo site_url('home') ?>"><i class="fa fa-home"></i></a>
			</li>

			<?php  
				$segment1 = $this->uri->segment(1);
				$segment2 = $this->uri->segment(2);
				$segment3 = $this->uri->segment(3);
				if ($segment2 == null)
				{
					echo '<li>
							'.ucwords($segment1).'
						  </li>';
				}
				else if($segment3 == null)
				{
					echo '<li>
							<a href="'.site_url($segment1).'">'.ucwords($segment1).'</a>
						  </li>
						  <li>
							'.ucwords($segment2).'
						  </li>
						  ';

				} else {
					echo '<li>
							<a href="'.site_url($segment1).'">'.ucwords($segment1).'</a>
						  </li>
						  <li>
							'.ucwords($segment2).'
						  </li>
						  <li>
							'.ucwords($segment3).'
						  </li>';
				}
			?>			
		</ol>
		<!-- Content Wrapper -->
		<div class="row">
			
