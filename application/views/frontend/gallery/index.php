<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<?php foreach ($galeri as $g): ?>
				<div class="col-md-4">
					<img src="<?php echo base_url('img/galeri.jpg') ?>" class="img-thumbnail" alt="">
					<div class="well well-sm" align="center">
						<a href="<?php echo site_url('galeri-foto/'.$g->id_galeri."_".url_title($g->nama)) ?>"><?php echo $g->nama ?></a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>