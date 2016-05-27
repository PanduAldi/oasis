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
		  margin-bottom: 60px;
		}

		.footer {
		  position: absolute;
		  bottom: 0;
		  width: 100%;
		  /* Set the fixed height of the footer here */
		  height: 70px;
		  background-color: #f5f5f5;
		}
	</style>


	<!-- Jquery  -->
	<script src="<?php echo base_url() ?>assets/jQuery-2.1.4.min.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
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
					<a class="navbar-brand" href="<?php echo site_url('dashboard') ?>"> Panel
						<?php 

							if ($this->session->userdata('level') == '1') 
							{
								echo "Administrator";
							}
							elseif ($this->session->userdata('level') == '2') 
							{
								echo "Marketing";
							}
						?>
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<?php echo $nav ?>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a onclick="return confirm('Yakin akan logout ?')" href="<?php echo site_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
								<li><a href="<?php echo site_url('profil_user') ?>"><i class="fa fa-user"></i> Profil User</a></li>
								
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</div>

	<!-- wrapper -->
	<div class="container">
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-home"></i></a>
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
		<legend><?php echo ucwords($title) ?></legend>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php echo $content ?>
					</div>
				</div>		
			</div>
		</div>	
	</div>
    <footer class="footer">
        <p align="center" style="margin-top:20px">Copyright &copy; 2016. <em>Sistem Informasi Pemasaran D'OASIS Residence.</em><br>Developed By. <em><a href="https://www.facebook.com/PanduAldiaja" target="_blank">Pandu Aldi Pratama</a></em></p>
    </footer>


	<!-- modal delete -->
	<div class="modal fade" id="modal-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Hapus Data
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_delete">
					Yakin Ingin Menghapus Data ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>

    <!-- Additional Jquery -->
    <script src="<?php echo base_url('assets/jquery_validate/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/jquery_tag/jquery.tagsinput.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
    <!-- datatables -->
	<script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.min.js"></script>
    <!-- global jquery -->
    <script src="<?php echo base_url() ?>assets/swal/sweetalert.min.js"></script>
    <script>
    	
    	$(function(){

    		tinymce.init({
    			selector : "textarea",
    			plugins: [
					      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
					      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
					      'save table contextmenu directionality emoticons template paste textcolor'
					     ]
    		})

    		$("#datatable").dataTable();
    	})

    </script>
</body>
</html>