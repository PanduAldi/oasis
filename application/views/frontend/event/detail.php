<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo ucwords($b->jenis_event) ?></h2>
			<p><small><?php echo $this->idn_time->tgl_db($b->t_publish)." | ".$this->idn_time->jam($b->t_publish) ?> WIB</small></p>
			<hr>
			<p>
				<center> <img src="<?php echo base_url('img/event/'.$b->img) ?>" class="img-responsive img-thumbnail" alt=""></center><br>
				<?php echo $b->deskripsi ?>
			</p>

			<div class="panel panel-warning">
				<div class="panel-body">
					<div class="fb-comments" data-href="<?php echo site_url('event/'.$b->kd_event."_".url_title($b->jenis_event)) ?>" data-width="800" data-numposts="10"></div>
				</div>
			</div>
		</div>
	</div>
</div>