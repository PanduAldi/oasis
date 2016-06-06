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
		<?php  
			$notif_pesan = $this->m_admin->notif_pesan();
			$notif_keluhan =  $this->m_admin->notif_keluhan();
		?>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i>  
			Kotak Masuk 
			<?php  
				$jum = $notif_pesan + $notif_keluhan;

				if ($jum == "0") 
				{
					echo "";
				}
				else
				{
					echo '<span class="label label-warning">'.$jum.'</span>';
				}				
			?>
		<b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo site_url('pesan') ?>">
				Pesan
				<?php 
					if ($notif_pesan == "0") 
					{
						echo "";
					}
					else
					{
						echo '<span class="label label-warning">'.$notif_pesan.'</span>';
					}
				?>
				</a>
			</li>
			<li><a href="<?php echo site_url('keluhan') ?>">
				Keluhan
				<?php 
					if ($notif_keluhan == "0") 
					{
						echo "";
					}
					else
					{
						echo '<span class="label label-warning">'.$notif_keluhan.'</span>';
					}
				?>
			</a></li>
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
	<?php if ($this->session->userdata('level') == 1): ?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file"></i> Laporan <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo site_url('laporan-pemesanan') ?>">Laporan Pemesanan</a></li>
			<li><a href="<?php echo site_url('laporan-konsumen') ?>">Laporan Konsumen</a></li>				
		</ul>
	</li>		
	<?php endif ?>
</ul>