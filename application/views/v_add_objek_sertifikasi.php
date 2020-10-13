<div class="content-wrapper" style="padding-top:50px">
	<section class="content">
		<div class="row">		
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Objek Sertifikasi</h3>
					</div>
					
					<div class="box-body">
						<form role="form" id="form_objek_sertifikasi" data-toggle="validator">
						<input type="hidden" name="form_id_objek" id="form_id_objek">				
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>STO</label>
										<select name="form_sto" id="form_sto" class="form-control" required>
											<option VALUE="" selected >STO</option>
											<option value ="1" >Ulin</option>
											<option value ="2" >Kayutangi</option>
											<option value ="3" >Banjarmasin</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Nama Objek</label>
										  <input type="text" class="form-control" name="form_nama_objek" id="form_nama_objek" placeholder="Nama Objek" required>										
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									  	<label>Deskripsi Objek</label>
									  	<textarea class="form-control" form="form_objek_sertifikasi" name="form_deskripsi_objek" id="form_deskripsi_objek" rows="6"></textarea>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-xs-6">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Tambah Field Objek Sertifikasi</h3>
						<div class="box-tools pull-right">
						
							<a href="javascript:void(0)" onclick="add_fields()" class="btn btn-sm btn-info btn-flat pull-left"><i class="fa fa-fw fa-plus"></i> Tambah Field</a>

						</div>
					</div>
					
					<div class="box-body">
						<form role="form" id="form_add_fields" data-toggle="validator">
							<input type="hidden" name="form_jumlah_fields" id="form_jumlah_fields">
							<div id="fields_body">
								<div class="row" id="fields_form">
									<div class="col-md-6">
										<div class="form-group">
										  <label>Nama Field</label>
										  <input type="text" class="form-control" name="form_nama_field_1" id="form_nama_field_1" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Isi Field</label>
											<input type="text" class="form-control" name="form_isi_field_1" id="form_isi_field_1" required>
										</div>
									</div>
								</div>
								<div class="row" id="fields">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

				<div class="col-lg-6 col-md-6 col-xs-6">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Tambah Media Objek Sertifikasi</h3>
						<div class="box-tools pull-right">
						
							<a href="javascript:void(0)" onclick="add_media()" class="btn btn-sm btn-info btn-flat pull-left"><i class="fa fa-fw fa-plus"></i> Tambah Media</a>

						</div>
					</div>
					
					<div class="box-body">
						<form role="form" id="form_add_media" data-toggle="validator">
							<input type="hidden" name="form_jumlah_media" id="form_jumlah_media">
							<div id="fields_body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										  <label>Deskripsi Media</label>
										  <input type="text" class="form-control" name="form_deskripsi_media_1" id="form_deskripsi_media_1" required>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label>Media</label>
											<input type="file" accept="media/*" class="form-control" id="form_media_1" name="form_media_1"  onchange="return fileValidation('form_media_1')">
										</div>
										
									</div>
									<div class="col-md-12">
										<div id="media_table">
										</div>
									</div>
								</div>
								<div class="row" id="media">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box text-center">
					<div class="box-body">
						<button type="submit" form="form_objek_sertifikasi" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script >
   //tinymce.init({ selector:'textarea' });
   var counter_fields = 1;
   var counter_media = 1;
   var action = "<?= $action; ?>";
   $('#form_jumlah_fields').val(counter_fields); 
   $('#form_jumlah_media').val(counter_media); 
   var active = "fields";
   $('#footer').show(); 
   $('#header_sertifikat').hide(); 
   $('#header_common').show(); 
   $('#form_sto').html("<?= $sto; ?>");
   if(action =="edit"){
   	$('#media_table').html('<?= $media; ?>');
   	$('#fields_form').html('<?= $field[0]; ?>');
   	$('#form_deskripsi_objek').val("<?= $deskripsi; ?>");
   	$('#form_nama_objek').val("<?= $nama_objek; ?>");
   	$('#form_sto').val("<?= $id_sto; ?>");
   	$('#form_id_objek').val("<?= $id_objek; ?>");
   	$('#form_jumlah_fields').val('<?= $field[1]; ?>'); 
   	counter_fields = '<?= $field[1]; ?>';
   }

	$('#form_objek_sertifikasi').validator().on('submit', function (e) {
		if (e.isDefaultPrevented()) {
			// handle the invalid form...
		} else {			
			isUpload = [];
			//Submit
			formData = new FormData(document.getElementById('form_add_media'));
			formData.append('form_sto',$('#form_sto').val());
			formData.append('form_nama_objek',$('#form_nama_objek').val());
			formData.append('form_deskripsi_objek',$('#form_deskripsi_objek').val());
			for (var i = 1; i <= $('#form_jumlah_fields').val(); i++) {
				formData.append('nama_fields[]',$('#form_nama_field_'+i).val());
				formData.append('isi_fields[]',$('#form_isi_field_'+i).val());
			}

			for (var i = 1; i <= $('#form_jumlah_media').val(); i++) {
				formData.append('deskripsi_media[]',$('#form_deskripsi_media_'+i).val());
			}

			for (var i = 1; i <= $('#form_jumlah_media').val(); i++) {
				if($('#form_media_'+i).val()){
					isUpload.push('upload');
				}else{
					isUpload.push('none');
				}
			}

			url='';
			if(action=="edit"){
				isUpload=['ada'];
				url="<?= base_url('add_objek_sertifikasi/updateObjekSertifikasi') ?>";
				formData.append('id_objek',$('#form_id_objek').val());
			}else{
				url="<?= base_url('add_objek_sertifikasi/submitObjekSertifikasi') ?>";
			}

			if(isUpload.includes('none')){
				Swal.fire('Oops...','Silakan Upload file terlebih dahulu.','error');
			}else{
				$.ajax({
					url: url,
					type: "POST",
					data:  formData,
					cache: false,
					dataType: 'json',
					processData:false,
					contentType:false,
					beforeSend : function(){
						show_loading();
					},
					success: function(json){
						if(json.status == 'OK'){
							hide_loading();
							Swal.fire('Berhasil',json.message,'success');
						}else{
							hide_loading();
							Swal.fire('Gagal',json.message,'error');
						}
					},
					error: function(e){
						hide_loading();
						Swal.fire('Oops...','Terjadi kesalahan, hubungi admin.','error');
					}          
				});
			}
			
			

			
			
			//console.log($("#form_objek_sertifikasi,#form_add_fields").serialize());
			
			e.preventDefault();
		}
	});

	$('#form_add_fields').validator().on('submit', function (e) {
		if (e.isDefaultPrevented()) {
			// handle the invalid form...
		} else {
			//Submit
			console.log($("#form_add_fields").serialize());
			
			e.preventDefault();
		}
	});

	function add_fields(){
		//console.log(counter
		counter_fields++;
		$("#fields").append("<div class='col-md-6'><div class='form-group'><label>Nama Field</label><input type='text'class='form-control' name='form_nama_field_"+counter_fields+"' id='form_nama_field_"+counter_fields+"' required></div></div><div class='col-md-6'><div class='form-group'><label>Isi Field</label><input type='text' class='form-control' name='form_isi_field_"+counter_fields+"' id='form_isi_field_"+counter_fields+"' required></div></div>");
		$('#form_jumlah_fields').val(counter_fields); 
	}

	function add_media(){
		//console.log(counter)
		counter_media++;
		$("#media").append('<div class="col-md-6"><div class="form-group"><label>Deskripsi Media</label><input type="text" class="form-control" name="form_deskripsi_media_'+counter_media+'" id="form_deskripsi_media_'+counter_media+'" required></div></div><div class="col-md-6"><div class="form-group"><label>Media</label><input type="file" accept="media/* "class="form-control" id="form_media_'+counter_media+'" name="form_media_'+counter_media+'"  onchange="return fileValidation(\'form_media_'+counter_media+'\')" required></div>');
		$('#form_jumlah_media').val(counter_media); 
	}
	
	function upload_media(name){
		formData = new FormData(document.getElementById('form_add_media'));
		name.forEach(
		 function tampil(element) {
		  formData.append('name[]',element)
		 }
		);
		$.ajax({
				//Submit
				url: "<?= base_url('add_objek_sertifikasi/upload') ?>",
				type: "POST",
				data:  formData,
				processData:false,
				contentType:false,
		        cache:false,
				success: function(data){
					hide_loading();
					Swal.fire('Berhasil',data.message,'success');
					console.log(data)
				},
				error: function(e){
					hide_loading();
					Swal.fire('Oops...','Terjadi kesalahan, hubungi admin.','error');
				}          
			});
		}

		function fileValidation(id_file){
		var fileInput = document.getElementById(id_file);
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.mp4)$/i;
		
		
		if(!allowedExtensions.exec(filePath)){
			Swal.fire('Please upload file having extensions .jpeg/.jpg/.png/.mp4 only.');
			fileInput.value = '';
			return false;
		}else{
			if(allowedExtensions.exec(filePath)[0]==('.jpg')||allowedExtensions.exec(filePath)[0]==('.png')||allowedExtensions.exec(filePath)[0]==('.jpeg')){
				if(fileInput.files[0].size > 10 * 1024 * 1024){ //10MB
			   		Swal.fire("Maksimal 10 MB!");
				   	fileInput.value = '';
				   	return false;
				};
			}else{
				if(fileInput.files[0].size > 100 * 1024 * 1024){ //50MB
			   		Swal.fire("Maksimal 100 MB!");
				   	fileInput.value = '';
				   	return false;
				};
			}
			return true;
		}
	}

	function delete_media(id_media,id_objek){
		var caption = 'Hapus Media ?';
			Swal.fire({
			title: 'Konfirmasi',
			text: caption,
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: "<?= base_url('add_objek_sertifikasi/deleteMedia') ?>",
					type: "POST",
					data:  {
							id_media: id_media,
							id_objek: id_objek
							},					
					dataType: 'json',
					beforeSend : function(){
						show_loading();
					},
					success: function(json){
						if(json.status=='OK'){
							$('#media_table').html(json.media);
							hide_loading();
							Swal.fire('Berhasil',json.message,'success');
						}else{
							hide_loading();
							Swal.fire('Gagal',json.message,'error');
						}
					},
					error: function(e){
						hide_loading();
						Swal.fire('Oops...','Terjadi kesalahan, hubungi admin.','error');
					}          
				});
			}
		});
	}


</script>
