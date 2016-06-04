<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo $title ?></h2>
			<hr>
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Data Blok Rumah</a>
					</li>
					<li role="presentation">
						<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Site Plan</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<?php foreach ($produk as $p): ?>
							<h4><a href="<?php echo site_url('produk-kami/blok/'.$p->kd_blok."_".$p->nama_blok) ?>"><?php echo "Blok ".ucwords($p->nama_blok) ?></a></h4>
							<div class="row">
								<div class="col-md-5">
									<img src="<?php echo base_url('img/rumah/'.$p->gambar) ?>" class="img-thumbnail img-responsive" alt="">
								</div>
								<div class="col-md-7">
					        		<label for="">Luas Bangun : </label> <?php echo $p->luas_bangun ?> m<sup>2</sup><br>
					        		<label for="">Luas Tanah : </label> <?php echo $p->luas_tanah ?> m<sup>2</sup><br>	
					        		<label for="">Muka : </label> <?php echo $p->muka ?> m<sup>2</sup><br>	
					        		<label for="">Panjang : </label> <?php echo $p->panjang ?> m<sup>2</sup><br>
					        		<label for="">Sertifikat : </label> <?php echo $p->sertifikat ?> <br>	
					        		<label for="">Harga : </label> Rp. <?php echo number_format($p->harga, 0, ".", "," ) ?><br><br>
					        		<a href="<?php echo site_url('produk-kami/blok/'.$p->kd_blok."_".$p->nama_blok) ?>">Lihat Data Rumah Blok <?php echo ucwords($p->nama_blok) ?></a>
								</div>
							</div>	
							<hr>
						<?php endforeach ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="tab">
						<img src="<?php echo base_url('img/site_plan.jpg') ?>" class="img-responsive" alt="Site Plan">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>