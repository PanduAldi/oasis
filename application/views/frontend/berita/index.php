<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo $title ?></h2><hr>
			<?php foreach ($berita as $b): ?>
				<div class="row">
					<div class="col-md-3">
						<img src="<?php echo base_url('img/berita/'.$b->gambar_info) ?>" class='img-thumbnail img-responsive' alt="">
					</div>
					<div class="col-md-9">
						<label class="control-label"><a href="<?php echo site_url('berita/'.$b->id."_".url_title($b->nama_info)) ?>"><?php echo ucwords($b->nama_info) ?></a></label><br>
						<small>
							<?php echo $this->idn_time->tgl_db($b->tgl_info)." | ".$this->idn_time->jam($b->tgl_info) ?> WIB
						</small><br>
						<p>
							<?php echo $b->meta_deskripsi ?>
						</p>
					</div>
				</div>
				<hr>
			<?php endforeach ?>

			<div id="paging">
				<?php echo $page ?>
			</div>
		</div>
	</div>
</div>