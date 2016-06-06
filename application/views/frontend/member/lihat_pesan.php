<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><?php echo $title ?></h2>
			<hr>
			<?php  
				$time = $this->idn_time;
				$tgl = $data_parent->tgl_pesan;
				
				echo $this->session->flashdata('balas-sukses');	
			?>
			<div class="utama">
				<strong><?php echo ucwords($data_parent->username)."</strong> &lt;".$data_parent->email."&gt;" ?><br>
				<small><?php echo $time->hari_indo($tgl).", ".$time->tgl_db($tgl)." | ".$time->jam($tgl) ?></small><br>
				<div class="well">
					<small><?php echo $data_parent->pesan ?></small>
				</div>
			</div>
			<hr>
			<div class="view_balasan">
				<?php foreach ($balas as $d): $tgl_balas = $d->tgl_pesan; ?>
					<div class="panel panel-default pesan-<?php echo $d->kd_pesan ?>">
						<div class="panel-body">
							<strong>
							<?php 
								echo ucwords($d->username)."</strong> &lt;".$d->email."&gt;"; 
								
								if ($d->level == "1") 
								{
									echo ' <label for="" class="label label-default">Admin</label>';
								}
								elseif ($d->level == "2") 
								{
									echo ' <label for="" class="label label-default">Marketing</label>';	
								}
							?> <br>
							<small><?php echo $time->hari_indo($tgl_balas).", ".$time->tgl_db($tgl_balas)." | ".$time->jam($tgl_balas) ?></small><br>
							<div class="well">
								<small><?php echo $d->pesan ?></small>
							</div>		
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<hr>
			<div class="balas">
				<form action="" method="POST" id="f_balas_pesan">
					<input type="hidden" name="kd_pesan" value="<?php echo $kd_pesan ?>">
					<div class="form-group">
						<label for="" class="control-label">Tulis Balasan : </label>
						<textarea name="pesan" id="pesan" class="form-control" cols="30" rows="10"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="balas" id="balas" class="btn btn-primary"><i class="fa fa-reply"></i> Balas Pesan</button>
					</div>
				</form>
			</div>

			<script>
				
				$(function(){
					$("#balas").attr('disabled', 'disabled');

					$("#pesan").keyup(function(){

						var balas = $(this).val();

						if(balas == "")
						{
							$("#balas").attr('disabled', 'disabled');
							
						}
						else 
						{
							$('#balas').removeAttr('disabled');
							
						}
					});

				})
			</script>
		</div>
	</div>
</div>