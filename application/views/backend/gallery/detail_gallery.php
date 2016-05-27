<div class="detail-galeri">
	<div class="well well-sm">
		<a href="<?php echo site_url('gallery/tambah_detail/'.$id) ?>" class="btn btn-primary btn-sm">Upload Gambar</a>
	</div>
	<div class="row">
		<?php foreach ($data->result() as $d): ?>
			<div class="col-md-3 col-xs-6 id_<?php echo $d->id_detail ?> ">
				<img src="<?php echo base_url('img/gallery/'.$d->gambar) ?>"  class="img-responsive img-thumbnail zoom" data="<?php echo $d->id_detail ?>" alt="">
				<div class="well well-sm" align="center">
					<small><?php echo $d->nama ?></small>
					<br><a href="javascript:void(0)" class="hapus" kode="<?php echo $d->id_detail ?>"><i class="fa fa-trash"></i></a>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>

<div class="modal fade" id="zoom_in">
	<div class="container">
		<p id="show_img"></p>
		<div class="well well-sm">
			<p id="show_name" align="center"></p>
		</div>
	</div>
</div>

<script>
	$(function(){

		$(".zoom").click(function(){
			var kode = $(this).attr('data');

			$.ajax({
				url : "<?php echo site_url('detail_gallery/zoom') ?>",
				type : "POST",
				data : { id : kode },
				success : function(msg){
					var dat = msg.split("|");

					var nama = dat[0];
					var img = dat[1];

					$("#show_name").html(nama);
					$("#show_img").html('<img src="<?php echo base_url()?>img/gallery/'+img+'" class="img-rounded" width="1140" height="600" style="margin-top:20px">');

					$("#zoom_in").modal("show");
				}
			})
		});

		$(".hapus").click(function(){
			var kode = $(this).attr('kode');

			$.ajax({
				url : "<?php echo site_url('detail_gallery/hapus') ?>",
				type : "POST",
				data : {id : kode},
				beforeSend : function(){
					$(".id_"+kode).html('<h3><i class="fa fa-spinner fa-spin"></i></h3>');
				},
				success : function(){
					$(".id_"+kode).fadeOut(500);
				}
			})
		});

	})
</script>