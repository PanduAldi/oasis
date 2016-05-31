<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo $title ?></h2><hr>
			<?php foreach ($event as $e): ?>
				<div class="row">
					<div class="col-md-3">
						<img src="<?php echo base_url('img/event/'.$e->img) ?>" class='img-thumbnail img-responsive' alt="">
					</div>
					<div class="col-md-9">
						<label class="control-label"><a href="<?php echo site_url('event/'.$e->kd_event."_".url_title($e->jenis_event)) ?>"><?php echo ucwords($e->jenis_event) ?></a></label><br>
						<small>
							<?php echo $this->idn_time->tgl_db($e->t_publish)." | ".$this->idn_time->jam($e->t_publish) ?> WIB
						</small><br>
						<p>
							<?php echo $e->deskripsi_singkat ?>...
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