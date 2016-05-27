<div class="panel-body">
	<h2 align="center"><?php echo $pesan ?></h2>
	<p align="center"> <i class="fa fa-spinner fa-3x fa-spin"></i></p>
	<p align="center"><em>Redirecting Halaman Blok Rumah...</em></p>
</div>

<script>
	setTimeout(function(){location.href="<?php echo site_url('blok_rumah') ?>"}, 2000);
</script>