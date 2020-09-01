<div class="content-wrapper" style="padding-top:50px">
	<section class="content">
		<div class="row">		
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-header">
						<i class="ion ion-clipboard"></i>
						<h3 class="box-title">Objek Sertifikasi</h3>
						<div class="box-tools pull-right">
						
							<a href="javascript:void(0)" onclick="add_objek_sertifikasi()" class="btn btn-sm btn-info btn-flat pull-left"><i class="fa fa-fw fa-plus"></i> Tambah Objek Sertifikasi</a>

						</div>
					</div>

					<div class="box-body">
						<table id="datatable_objek_sertifikasi" style="width:100%" class="table table-bordered table-striped nowrap">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Sertifikasi</th>
									<th>Sertifikasi</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>



<div class="modal fade" id="modal_jenis_sertifikasi" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header bg-green">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Jenis Sertifikasi</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_objek_sertifikasi" value="">
				<div class="row">
					<div class="col-lg-12">
						<a href="javascript:void(0)" onclick="add_jenis_sertifikasi()" class="btn btn-sm btn-info btn-flat hidden-xs pull-left"><i class="fa fa-fw fa-plus"></i> Tambah Sertifikasi</a>
					</div>
				</div>
				
				<table id="datatable_jenis_sertifikasi" style="width:100%" class="table table-bordered table-striped nowrap">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Setifikasi</th>
							<th>Tanggal Sertifikasi</th>
							<th>Nama Certifier</th>
							<th>Jabatan</th>
							<th>NIK</th>
							<th>Valid until</th>
							<th>Kode QR</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_add_jenis_sertifikasi" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-md modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Sertifikasi</h4>
			</div>
			
			<form role="form" id="form_jenis_sertifikasi" data-toggle="validator">
				<input type="hidden" name="form_id_objek" id="form_id_objek">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label>Nama Sertifikasi</label>
							  <input type="text" class="form-control" name="form_nama_sertifikasi" id="form_nama_sertifikasi" placeholder="Nama Sertifikasi" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Certifier</label>
								<input type="text" class="form-control" name="form_nama_certifier" id="form_nama_certifier" placeholder="Nama Certifier" required>
								<!--<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" name="form_tanggal_mulai" id="form_tanggal_mulai" required>
								</div>-->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Jabatan Certifier</label>
								<input type="text" class="form-control" name="form_jabatan_certifier" id="form_jabatan_certifier" placeholder="Jabatan Certifier" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>NIK Certifier</label>
								<input type="text" class="form-control" name="form_nik_certifier" id="form_nik_certifier" placeholder="NIK certifier" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Tanggal Sertifikasi</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" name="form_tgl_sertifikasi" id="form_tgl_sertifikasi" required>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Valid Until</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" name="form_valid_until" id="form_valid_until" required>
								</div>
							</div>
						</div>
					</div>				
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_kode_qr" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Kode QR <span id='nama_objek'></span></h4>
			</div>
			<div class="modal-body">
				<div id="img_qr" align="center">
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#header_sertifikat').hide(); 
	$('#header_common').show(); 
	$('#footer').show(); 
	$(function () {
		table_objek_sertifikasi = $('#datatable_objek_sertifikasi').DataTable({ 
			"dom":'<"row"<"col-md-6.col-xs-4"l><"col-md-6.col-xs-8"f>>t<"row"<"col-md-6"i><"col-md-6"p>>r',
			"scrollX": true,
			"ordering" : false,
			"lengthChange": true,
			"responsive": true,
			"scrollY":'60vh',
			"searchDelay": 1000,
			"scrollCollapse": true,
			"language": {
				"paginate": {
					"previous": "Prev"
				},
				"lengthMenu": "_MENU_ data",
				"search": "_INPUT_",
				"searchPlaceholder": "Search..."
			},
			"processing": true,
			"serverSide": true,
			
			"ajax": {
				"url": "<?php echo base_url()?>home/getDataObjekSertifikasi",
				"type": "POST"
			},
			"columns": [{ 
					"data": "no",
					"className" : "dt-center",
				},{ 
					"data": "nama_objek_sertifikasi",
					"className" : "dt-center",
				},{ 
					"data": "jenis",
					"className" : "dt-center",
				},{
					"data": "action",
					"className" : "dt-center"
				}
			]
		});
		
		$("#datatable_objek_sertifikasi > label > select").css({"width":"45px","padding":"1px"});

		table_jeniis_sertifikasi = $('#datatable_jenis_sertifikasi').DataTable({ 
			"dom":'<"row"<"col-md-6.col-xs-4"><"col-md-6.col-xs-8">>t<"row"<"col-md-6"i><"col-md-6">>r',
			"scrollX": true,
			"ordering" : false,
			"lengthChange": true,
			"responsive": true,
			"scrollY":'60vh',
			"searchDelay": 1000,
			"scrollCollapse": true,
			"language": {
				"paginate": {
					"previous": "Prev"
				},
				"lengthMenu": "_MENU_ data",
				"search": "_INPUT_",
				"searchPlaceholder": "Search..."
			},
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?php echo base_url()?>/home/getDataJenisSertifikasi",
				"type": "POST",
				"data":function (d) {
					d.id_objek = $('#id_objek_sertifikasi').val();
				}
			},
			"columns": [
				{ 
					"data": "no",
					"className" : "dt-center"
				},{ 
					"data": "nama_sertifikasi",
					"className" : "dt-center"
				},{
					"data": "tgl_sertifikasi",
					"className" : "dt-center"
				},{
					"data": "nama_certifier",
					"className" : "dt-center"
				},{
					"data": "jabatan_certifier",
					"className" : "dt-center"
				},{
					"data": "nik_certifier",
					"className" : "dt-center"
				},{
					"data": "valid_until",
					"className" : "dt-center"
				},{
					"data": "action",
					"className" : "dt-center"
				}
			]
		});

		$("#datatable_jenis_sertifikasi > label > select").css({"width":"45px","padding":"1px"});

	});

	$('#form_tgl_sertifikasi').datepicker({
		format: "yyyy-mm-dd",
		todayHighlight: true,
		todayBtn: "linked",
		autoclose: true
    });



	$('#form_valid_until').datepicker({
		format: "yyyy-mm-dd",
		todayHighlight: true,
		todayBtn: "linked",
		autoclose: true
    });

	function add_objek_sertifikasi(){
		//console.log(counter)
		window.location.href = "<?php echo base_url();?>add_objek_sertifikasi/add_objek/";
	}

	function show_qr(kode_qr,nama_objek){
		$('#nama_objek').text(nama_objek); 
		$('#img_qr').html('<img src="<?php echo base_url()?>assets/qr_code/'+kode_qr+'.png" style="width: 250px;margin: auto;">'); 
		$('#modal_kode_qr').modal('show'); 
	}

	function open_certificate(id_objek){
		console.log(id_objek)
		$('#id_objek_sertifikasi').val(id_objek);
		table_jeniis_sertifikasi.ajax.reload();
		$('#modal_jenis_sertifikasi').modal('show');
		//console.log(counter)
		//window.open("<?php echo base_url();?>sertifikat/cetak/"+kode_qr, '_blank');
		//window.location.href = "<?php echo base_url();?>sertifikat/cetak/"+kode_qr;
	}

	function cetak_sertifikat(kode_qr){
		window.open("<?php echo base_url();?>sertifikat/cetak/"+kode_qr, '_blank');
	}
	
	function add_jenis_sertifikasi(){
		//CLEAR FORM FIRST
		document.getElementById("form_jenis_sertifikasi").reset();
		$('#form_id_objek').val($('#id_objek_sertifikasi').val());
		$('#modal_add_jenis_sertifikasi').modal('show');
	}

		$('#form_jenis_sertifikasi').validator().on('submit', function (e) {		
		if (e.isDefaultPrevented()) {
			// handle the invalid form...
		} else {
			$.ajax({
					//Submit
					url: "<?= base_url('home/submitJenisSertifikasi') ?>",
					type: "POST",
					data:  $("#form_jenis_sertifikasi").serialize(),
					dataType: 'json',
					cache: false,
					processData:false,
					beforeSend : function(){
						show_loading();
					},
					success: function(data){
						hide_loading();
						if(data.status == 'OK'){
							table_jeniis_sertifikasi.ajax.reload();
							table_objek_sertifikasi.ajax.reload();
							$('#modal_add_jenis_sertifikasi').modal('hide');
							Swal.fire('Berhasil',data.message,'success');
						}else{
							Swal.fire('Gagal','Terjadi Kesalahan Hubungi Admin','error');
						}
					},
					error: function(e){
						hide_loading();
						Swal.fire('Oops...','Terjadi kesalahan, hubungi admin.','error');
					}          
				});
			e.preventDefault();
		}
	});
</script>