<div class="row">
	<div class="col-lg-3">
		<?php echo $menu_produk ?>
	</div>
	<div class="col-lg-9">
		<?php echo $this->session->flashdata('info'); ?>
		<div class="panel panel-primary">
			<div class="panel-body">
				<form id="tambah_spesifikasi" method="POST" class="form-horizontal">
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Pondasi :</label>
						<div class="col-md-9">
							<input type="text" name='pondasi' class="form-control" value="<?php echo $spek->pondasi ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Struktur :</label>
						<div class="col-md-9">
							<input type="text" name='struktur' class="form-control" value="<?php echo $spek->struktur ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Dinding :</label>
						<div class="col-md-9">
							<input type="text" name='dinding' class="form-control" value="<?php echo $spek->dinding ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Atap :</label>
						<div class="col-md-9">
							<input type="text" name='atap' value="<?php echo $spek->atap ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Lantai Utama :</label>
						<div class="col-md-9">
							<input type="text" name='lantai_utama' class="form-control" value="<?php echo $spek->lantai_utama ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label"> Lantai Toilet :</label>
						<div class="col-md-9">
							<input type="text" name='lantai_toilet' value ="<?php echo $spek->lantai_toilet ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Kusen :</label>
						<div class="col-md-9">
							<input type="text" name='kusen' value="<?php echo $spek->kusen ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Pintu :</label>
						<div class="col-md-9">
							<input type="text" name='pintu' value="<?php echo $spek->pintu ?>" class="form-control">
						</div>				
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Jendela :</label>
						<div class="col-md-9">
							<input type="text" name='jendela' class="form-control" value="<?php echo $spek->jendela ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Plafond :</label>
						<div class="col-md-9">
							<input type="text" name='plafond' value="<?php echo $spek->plafond ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Saniter :</label>
						<div class="col-md-9">
							<input type="text" name='saniter' class="form-control" value="<?php echo $spek->saniter ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Carport :</label>
						<div class="col-md-9">
							<input type="text" name='carport' value="<?php echo $spek->carport ?>" class="form-control">
						</div>
					</div>

					<hr>
					<div class="form-group">
						<div class="col-md-3">
							<button type="submit" name="edit" class="btn btn-warning">Edit Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	
	$(function(){

		//validate
		$("#tambah_spesifikasi").validate({

			rules : {
				"pondasi" : "required",
				"struktur" : "required",
				"dinding" : "required",
				"atap" : "required",
				"lantai_utama" : "required",
				"lantai_toilet" : "required",
				"kusen" : "required",
				"pintu" : "required",
				"plafond" : "required",
				"saniter" : "required",
				"carport" : "required"
			},

			messages : {
				"pondasi" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"struktur" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"dinding" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"atap" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"lantai_utama" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"lantai_toilet" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"kusen" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"pintu" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"plafond" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"saniter" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				},
				"carport" : {
					"required" : '<div class="text-danger"> Harus di isi</div>'
				}
			}

		})
	})
</script>