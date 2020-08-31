<link rel="stylesheet" href="<?php echo base_url()?>assets/Magnific-Popup/dist/magnific-popup.css">
<script src="<?php echo base_url()?>assets/Magnific-Popup/dist/jquery.magnific-popup.js"></script>
<script src="<?php echo base_url()?>assets/js/validator.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>assets/sweetalert2/sweetalert2.css">
<script src="<?php echo base_url()?>assets/sweetalert2/sweetalert2.all.js"></script>

<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<!--<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>-->

<div class="content-wrapper" style="padding-top:50px">
	<div class="content-header-custom">
		<h1 align='center'><?= $title->nama_objek_sertifikasi; ?></h1>
	</div>
    <section class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					
					<div class="box-body">
						<div class="row ">
							<div id="title_objek" class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
								<h4>Sertifikasi <?= $title->nama_sertifikasi; ?></h4>
								<h4>Certifier : <?= $title->nama_certifier; ?></h4>
								<h4>Jabatan : <?= $title->jabatan_certifier; ?></h4>
								<h4>Tanggal : <?= $title->tanggal; ?></h4>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<img align="right" src="<?php echo base_url()?>assets/img/sertif.jpg" style="height: 120px;">
							</div>


						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="box">
					
					<div class="box-body">
						<div class="row">
							<div class="col-lg-12">  
						        <div class="testimoni">
						            <div id="testimoni1" class="core-slider">
						              <div class="core-slider_viewport">
						                <div id="media" class="core-slider_list">
						                	<?php foreach($media as $row){
											if($row->tipe_media == "PHOTO"){ ?>
												<a class="image-popup-no-margins" href="<?php echo base_url()?>assets/photo_upload/<?=$row->url?>">
													<div class="core-slider_item" style="vertical-align:middle;margin:auto">
														<figure>
															<img src="<?php echo base_url()?>assets/photo_upload/<?= $row->url?>" class="img-fluid mb-4" alt="" style="bottom:0px;"/>
															<figcaption style="color: black;"><?= $row->deskripsi_media ?></figcaption>
														</figure>
													</div>
												</a> 
											<?php } else if($row->tipe_media == "VIDEO"){ ?>
													<div class="core-slider_item">
														<figure>
															<div class="embed-responsive embed-responsive-16by9">
																<video class="embed-responsive-item" controls>
																	<source src="<?php echo base_url()?>assets/video_upload/<?=$row->url?>" type="video/mp4">
																</video>
															</div>
															<figcaption><?= $row->deskripsi_media ?></figcaption>
														</figure>
													</div>
											<?php } } ?>
						                </div>
						              </div>
						              <div class="core-slider_nav" id="slider_arrow">
						                <div class="core-slider_arrow core-slider_arrow__right"></div>
						                <div class="core-slider_arrow core-slider_arrow__left"></div>
						              </div>
						            <div class="core-slider_control-nav" id="slider_control"></div>
						          </div>
						        </div>
						      </div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="box">
					
					<div class="box-body">
						<div class="row ">
							<div id="deskripsi_objek" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
								<p align='justify'><?= $title->deskripsi; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box">
					
					<div class="box-body">
						<div class="row ">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="fields">
								<table class="table table-bordered" style="margin-bottom: 0px;">
								<?php foreach($fields as $row){ ?>
								<tr>
								    <td><?=$row->nama_field;?></td>
								    <td><?=$row->isi_field;?></td>
								  </tr>
								<?php } ?>
								</table>
							</div>						
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</section>
</div>

<script>
	var count = <?= $count ?>;
		if(count<=1){
			$('#slider_arrow').hide(); 
			$('#slider_control').hide(); 
		}
		$('#testimoni1').coreSlider({
			 pauseOnHover: false,
			 interval: 3000,
			 controlNavEnabled: true
		});
		activatePopup();

	var kode_qr = '<?= $kode_qr ?>';
	$('#header_sertifikat').show(); 
	$('#header_common').hide(); 
	$('#footer').show(); 
	function activatePopup(){
		$('.image-popup-no-margins').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			fixedContentPos: true,
			mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
			image: {
				verticalFit: true
			},
			zoom: {
				enabled: true,
				duration: 300 // don't foget to change the duration also in CSS
			}
        });
	}
	



</script>	