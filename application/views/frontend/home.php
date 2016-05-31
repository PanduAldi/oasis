<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="carousel">
				<div id="carousel-id" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-id" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-id" data-slide-to="1" class=""></li>
						<li data-target="#carousel-id" data-slide-to="2" class=""></li>
						<li data-target="#carousel-id" data-slide-to="3" class=""></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active ukuran">
							<img alt="First slide" src="<?php echo base_url('img/gallery/DSCN1486.JPG') ?>" class="ukuran">
							<div class="container">
								<div class="carousel-caption">
									<h1>SELAMAT DATANG</h1>
									<p>Selamat datang di website D'OASIS Residence. Website ini adalah sebuah sistem infomasi untuk mengenalkan perumahan D'Oasis Residence Brebes</p>
									<p><a class="btn btn-lg btn-primary" href="<?php echo site_url('profil-kami') ?>" role="button">Profil Kami</a></p>
								</div>
							</div>
						</div>

						<?php foreach ($berita as $b): ?>
						<div class="item ukuran">
							<img alt="<?php echo url_title($b->nama_info) ?>" width="900" src="<?php echo base_url('img/berita/'.$b->gambar_info) ?>" class="ukuran">
							<div class="container">
								<div class="carousel-caption">
									<h1><?php echo ucwords($b->nama_info) ?></h1>
									<p><?php echo substr($b->meta_deskripsi, 0, 100) ?></p>
									<p><a class="btn btn-lg btn-primary" href="<?php echo site_url('berita/'.$b->id.'_'.url_title($b->nama_info)) ?>" role="button">Lihat Selengkapnya</a></p>
								</div>
							</div>		
						</div>
						<?php endforeach ?>	
					</div>
					<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left fa fa-angle-left fa-4x"></span></a>
					<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right fa fa-angle-right fa-4x"></span></a>
				</div>
			</div>
			<hr>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Kavling D'OASIS Residence</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						 <?php foreach ($produk as $p): ?>
					 		<div class="col-md-4">
								<div class="thumbnail">
								    <img src="<?php echo base_url('img/rumah/'.$p->gambar) ?>" alt="...">
							      	<div class="caption">
							        	<h3>Blok <?php echo ucwords($p->nama_blok) ?></h3>
							        	<p>
							        		<label for="">Luas Bangun : </label> <?php echo $p->luas_bangun ?> m<sup>2</sup>
							        		<label for="">Luas Tanah : </label> <?php echo $p->luas_tanah ?> m<sup>2</sup><br>	
							        		<label for="">Harga : </label> Rp. <?php echo number_format($p->harga, 0, ".", "," ) ?>	
							        	</p>
							        	<p><a href="<?php echo site_url('produk/blok/'.$p->kd_blok.'_'.$p->nama_blok) ?>" class="btn btn-primary" role="button">Lihat Detail Rumah</a> 
									</div>
								</div>
					 		</div>
					 	<?php endforeach ?>
					</div>
				</div>
			</div>
			<hr>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Event / Kegiatan kami :</h4>			
				</div>
				<div class="panel-body">
					<?php foreach ($event as $e): ?>
						<div class="row">
							<div class="col-md-3">
								<img src="<?php echo base_url('img/event/'.$e->img) ?>" alt="<?php echo url_title($e->jenis_event) ?>" class="img-thumbnail img-responsive">
							</div>
							<div class="col-md-9">
								<a href="<?php echo site_url('event/'.$e->kd_event."_".url_title($e->jenis_event)) ?>"><?php echo ucwords($e->jenis_event) ?></a><br>
								<small><?php echo $this->idn_time->tgl_db($e->t_publish)." | ".$this->idn_time->jam($e->t_publish) ?> WIB</small>
								<p>
									<?php echo substr($e->deskripsi, 0, 100) ?>
								</p>
							</div>
						</div><hr>
					<?php endforeach ?>
				</div>
			</div>
			<hr>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Gallery Foto :</h4>	
				</div>
				<div class="panel-body">
					<div class="row">
						<?php foreach ($galeri as $g): ?>
							<div class="col-md-4">
								<img src="<?php echo base_url('img/logo.png') ?>" class="img-thumbnail" alt="">
								<div class="well well-sm" align="center">
									<a href="<?php echo site_url('galeri-foto/'.$g->id_galeri."_".url_title($g->nama)) ?>"><?php echo $g->nama ?></a>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>