
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title><?php echo $title ?></title>

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




	<!-- Jquery  -->
	<script src="<?php echo base_url() ?>assets/jQuery-2.1.4.min.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

	<h2 align="center"> <?php echo $title ?></h2>
	<br>
	<div class="container">
		<table class="table table-bordered">
				<tr>
					<th>ID Pemesanan</th>
					<th>Konsumen</th>
					<th>Kode Rumah</th>
					<th>Tanggal Pemesanan</th>
					<th>Cara Bayar </th>
				</tr>
				<?php foreach ($pemesanan as $p): ?>
					<tr>
						<td><?php echo $p->id_pemesanan ?></td>
						<td><?php echo $p->id_user ?></td>
						<td><?php echo $p->kd_rumah ?></td>
						<td><?php echo $p->tgl_pemesanan ?></td>
						<td><?php echo $p->cara_bayar ?></td>
					</tr>
				<?php endforeach ?>
			
		</table>
	</div>
  </body>
</html>

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
	  .table {
	    border-collapse: collapse !important;
	  	
	  }

	  .table td,
	  .table th {
	    background-color: #fff !important;
	  	padding : 10px;
	  }
	  .table-bordered th,
	  .table-bordered td {
	    border: 1px solid black !important;
	  }
	</style>

