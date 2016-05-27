<div class="back">
	<p align="right"> <a href="<?php echo site_url('berita') ?> "><i class="fa fa-angle-double-left"></i> Kembali</a></p>
</div>
<div class="row">
	<div class="col-lg-7">
		<table class="table table-striped">
			<tr>
				<td width="120">Judul berita :</td>
				<td width="10">:</td>
				<td><?php echo $data->nama_info ?></td>
			</tr>
			<tr>
				<td>Meta keyword</td>
				<td>:</td>
				<td><?php echo $data->meta_keyword ?></td>
			</tr>
			<tr>
				<td>Meta Deskripsi</td>
				<td>:</td>
				<td><?php echo $data->meta_deskripsi ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td><?php echo $data->deskripsi ?></td>
			</tr>
			<tr>
				<td>Tanggal Publish</td>
				<td>:</td>
				<td><?php echo $data->tgl_info ?></td>
			</tr>
		</table>
	</div>
	<div class="col-lg-5">
		<img src="<?php echo base_url('img/berita/'.$data->gambar_info) ?>" class="img-responsive img-thumbnail" alt="Image">
	</div>
</div>	