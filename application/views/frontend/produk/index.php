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

								</div>
							</div>	
							<hr>
						<?php endforeach ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="tab">...</div>
				</div>
			</div>
		</div>
	</div>
</div>