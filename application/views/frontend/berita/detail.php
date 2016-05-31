<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo ucwords($b->nama_info) ?></h2>
			<p><small><?php echo $this->idn_time->tgl_db($b->tgl_info)." | ".$this->idn_time->jam($b->tgl_info) ?> WIB</small></p>
			<hr>
			<p>
				<center> <img src="<?php echo base_url('img/berita/'.$b->gambar_info) ?>" class="img-responsive img-thumbnail" alt=""></center><br>
				<?php echo $b->deskripsi ?>
			</p>

			<div class="panel panel-warning">
				<div class="panel-body">
					<div class="fb-comments" data-href="<?php echo site_url('berita/'.$b->id."_".url_title($b->nama_info)) ?>" data-width="800" data-numposts="10"></div>
				</div>
			</div>
		</div>
	</div>
</div>