<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
			<?php foreach ($gal as $d): ?>
					<div class="col-md-3 col-xs-6 id_<?php echo $d->id_detail ?> ">
						<img src="<?php echo base_url('img/gallery/'.$d->gambar) ?>"  class="img-responsive img-thumbnail zoom" data="<?php echo $d->id_detail ?>" alt="">
						<div class="well well-sm" align="center">
							<?php echo $d->nama ?>
						</div>
					</div>
			<?php endforeach ?>
			</div>
		</div>
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
				url : "<?php echo site_url('zoom-foto') ?>",
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

	})
</script>