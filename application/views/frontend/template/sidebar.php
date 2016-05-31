<div class="col-lg-3">
	<?php  
		if ($this->session->userdata('login_member') == true) 
		{
		?>
			<div class="panel panel-default">
				<div class="panel-heading">
					Menu Anda
				</div>
				<div class="panel-body">
					<ul>
						<li><a href="<?php echo site_url('profil-anda') ?>">Profil Anda</a></li>
						<li><a href="<?php echo site_url('data-pemesanan') ?>">Data Pemesanan</a></li>
						<li><a href="<?php echo site_url('data-pembayaran') ?>">Data Pembayaran</a></li>
						<li><a href="<?php echo site_url('pesan-anda') ?>">Pesan</a></li>
						<li><a href="<?php echo site_url('keluhan-anda') ?>">Keluhan</a></li>
						<li><a href="<?php echo site_url('logout') ?>">Logout</a></li>
					</ul>
				</div>
			</div>
		<?php
		}else
		{
			?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					Login Panel
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('login_member') ?>" name="f_login_member" method="POST">
						<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="Masukan Username">
						</div>
						<div class="form-group">
							<input type="password" name="password" placeholder="Masukan Password" class="form-control">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Belum Punya Akun ? </label><br>
							<a href="<?php echo site_url('register') ?>"><i class="fa fa-pencil"></i> Registrasi Disini</a>
						</div>
				</div>
				<div class="panel-footer">
					<button type="submit" name="login" class="btn btn-primary"><i class="fa fa-sign-up"></i> Login</button>
					</form>
				</div>
			</div>
			<?php
		}
	?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Kontak Kami :
		</div>
		<div class="panel-body">
			<address>
			  <strong>PT. Berkah Esa Sejahtera</strong><br>
			  Jl. Sultan Agung Rt 01 / 01 Desa Pulosari<br>
			  Brebes, 52213<br>
			  <abbr title="Phone">Telp:</abbr> (0283) 441404
			</address>

		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Partner Kami :
		</div>
		<div class="panel-body">
			<img src="<?php echo base_url('img/kerjasama/btnproperti.png') ?>" height="100" class="img-responsive" alt=""><br>
			<img src="<?php echo base_url('img/kerjasama/kpr_bri.png') ?>" height="100" class="img-responsive" alt=""><br>
			<img src="<?php echo base_url('img/kerjasama/kpr_bca.jpg') ?>" height="100" class="img-responsive" alt="">
		</div>
	</div>
</div>