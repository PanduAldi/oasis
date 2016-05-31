		</div>
	</div>
    <footer class="footer">
        <p align="center" style="margin-top:20px">Copyright &copy; 2016. <em>Sistem Informasi Pemasaran D'OASIS Residence.</em><br>Developed By. <em><a href="https://www.facebook.com/PanduAldiaja" target="_blank">Pandu Aldi Pratama</a></em>
        </p>
    </footer>


	<!-- modal delete -->
	<div class="modal fade" id="modal-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Hapus Data
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_delete">
					Yakin Ingin Menghapus Data ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>

    <!-- Additional Jquery -->
    <script src="<?php echo base_url('assets/jquery_validate/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/jquery_tag/jquery.tagsinput.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
    <!-- datatables -->
	<script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.min.js"></script>
    <!-- global jquery -->
    <script src="<?php echo base_url() ?>assets/swal/sweetalert.min.js"></script>
    <script>
    	
    	$(function(){

    		tinymce.init({
    			selector : "#text",
    			plugins: [
					      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
					      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
					      'save table contextmenu directionality emoticons template paste textcolor'
					     ]
    		})

    		$("#datatable").dataTable();
    	})

    </script>
</body>
</html>