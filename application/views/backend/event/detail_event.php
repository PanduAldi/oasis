<div class="back">
	<p align="right"> <a href="<?php echo site_url('event') ?> "><i class="fa fa-angle-double-left"></i> Kembali</a></p>
</div>
<div class="row">
	<div class="col-lg-7">
		<table class="table table-striped">
			<tr>
				<td width="120">Jenis Event</td>
				<td width="10">:</td>
				<td><?php echo $ev->jenis_event ?></td>
			</tr>
			<tr>
				<td>Periode</td>
				<td>:</td>
				<td><?php echo $per->periode." (".$per->keterangan.")" ?></td>
			</tr>
			<tr>
				<td>Tanggal Publish</td>
				<td>:</td>
				<td><?php echo $ev->t_publish ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td><?php echo $ev->deskripsi ?></td>
			</tr>
		</table>
	</div>
	<div class="col-lg-5">
		<img src="<?php echo base_url('img/event/'.$ev->img) ?>" class="img-responsive" alt="Image">
	</div>
</div>	