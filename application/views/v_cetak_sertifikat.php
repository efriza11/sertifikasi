<div class="container" align="center" style="height: 21cm;
        width: 29.5cm;padding: 0;">
  <img src="<?php echo base_url('assets/img/sertifikat.png') ?>" alt="Snow" style="width:100%;">
  <div class="nama-sertifikasi"><h1 style="color:white!important;font-weight:bold;text-transform:uppercase;font-size:<?php if(strlen($title->nama_sertifikasi)<=17){echo "55px";}else{echo "45px";} ?>;"><?= $title->nama_sertifikasi; ?></h1></div>
  <div class="tanggal-jabatan"><p style="color:black;font-size:27px"><?= $title->tanggal_indo; ?></br>
                                    <?= $title->jabatan_certifier; ?></p></div>
  <div class="nama-certifier"><h2 style="color:black;font-weight: bold; font-size:35px;"><?= $title->nama_certifier; ?></h2></div>
  <div class="nik-certifier"><h2 style="color:black;font-weight: bold;  font-size:35px;">NIK. <?= $title->nik_certifier; ?></h2></div>
  <div class="img-qr"><img src="<?php echo base_url()?>assets/qr_code/<?= $title->kode_qr; ?>.png" style="width: 130px;"></div>
  <div class="objek-sertifikasi" ><h1 style="color:black;font-weight: bold;text-transform:uppercase;font-size:<?php if(strlen($title->nama_objek_sertifikasi)<=17){echo "55px";}else{echo "45px";} ?>;"><?= $title->nama_objek_sertifikasi; ?></h1></div>

</div>
<script>
      $('#header_sertifikat').hide(); 
      $('#header_common').hide(); 
      $('#loader-wrapper').hide(); 
       $( document ).ready(function() {
          $('#footer').hide();
          window.print()
          setTimeout(function(){ window.top.close(); }, 1000);
          
      });

</script>