<script>
	
	function setForm(file)
	{
		opener.document.f_blok_rumah.gambar.value = file;
		self.close();
		return false;
	}
</script>

<div class="alert alert-success">
	Upload Gambar Sukses. Klik tombol Pasang Gambar untuk melanjutkan pengisian blok rumah
</div>
<div id="detailnya">
	<img src="<?php echo base_url('img/rumah/'.$gambar) ?>" class="img-thumbnail img-responsive" width="300" height="300" alt=""><br>
	<a href="#" onclick="javascript:return setForm('<?php echo $gambar ?>')" class="btn btn-default">Pasang Gambar</a>
</div>