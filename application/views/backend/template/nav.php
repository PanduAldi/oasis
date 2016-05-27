<ul class="nav navbar-nav navbar-left menu">
	<li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i>  Dashboard </a></li>
	<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-database"></i> Master Data<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<?php if ($this->session->userdata('level') == "1"): ?>
					<li><a href="<?php echo site_url('profil') ?>">Profil</a></li>
					<li><a href="<?php echo site_url('produk') ?>">Produk</a></li>
					<li><a href="<?php echo site_url('periode') ?>">Periode</a></li>					
				<?php endif ?>
				<li><a href="<?php echo site_url('berita') ?>">Berita</a></li>
				<li><a href="<?php echo site_url('event') ?>">Event</a></li>
			</ul>
		</li>
	<?php if ($this->session->userdata('level') == "1"): ?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"></i> Transaksi <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo site_url('konsumen') ?>">Konsumen</a></li>
			<li><a href="<?php echo site_url('pemesanan') ?>">Pemesanan</a></li>
			<li><a href="<?php echo site_url('pembayaran') ?>">Pembayaran</a></li>
		</ul>
	</li>
<?php endif; ?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i>  Kotak Masuk <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<?php  
				$notif_pesan = $this->m_admin->notif_pesan();
			?>
			<li><a href="<?php echo site_url('pesan') ?>">Pesan <span class="label label-warning"><?php echo $notif_pesan ?></span></a></li>
			<li><a href="<?php echo site_url('keluhan') ?>">Keluhan</a></li>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-archive"></i> Module <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<?php if ($this->session->userdata('level') == "1"): ?>
			<li><a href="<?php echo site_url('user') ?>">User</a></li>				
			<?php endif ?>
			<li><a href="<?php echo site_url('gallery') ?>">Gallery</a></li>
		</ul>
	</li>
</ul>