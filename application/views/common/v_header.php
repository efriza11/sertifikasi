<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sertifikasi</title>
  <link rel="icon" href="<?php echo base_url()?>assets/img/favicon.png" type="image/gif" sizes="32x32"> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/bootstrap/dist/css/bootstrap.css" media="all">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/dist/css/AdminLTE.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/dist/css/custom.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/dist/css/skins/_all-skins.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
  <!-- Time Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/plugins/timepicker/bootstrap-timepicker.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <!--<link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">-->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!--TOOGLE-->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-toggle.css">
  
  <style>
  
	
/*
 *  SCROLL DESIGN
 */


::-webkit-scrollbar-track{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

::-webkit-scrollbar{
	width: 5px;
	background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb{
	background-color: #0ae;	
	background-image: -webkit-gradient(linear, 0 0, 0 100%,
	                   color-stop(.5, rgba(255, 255, 255, .2)),
					   color-stop(.5, transparent), to(transparent));
}



/*----------------------------------------
    Pre-loader
------------------------------------------*/
#loader-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1031;
}

#loader-wrapper .loader-section {
  position: fixed;
  top: 0;
  width: 51%;
  height: 100%;
  background: #eceff1;
  z-index: 1031;
  -webkit-transform: translateX(0);
  -ms-transform: translateX(0);
  transform: translateX(0);
}

#loader-wrapper .loader-section.section-left {
  left: 0;
}

#loader-wrapper .loader-section.section-right {
  right: 0;
}

#loader {
  display: block;
  position: relative;
  left: 50%;
  top: 50%;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border-radius: 50%;
  border: 3px solid transparent;
  border-top-color: #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  z-index: 1032;
}

#loader:before {
  content: "";
  position: absolute;
  top: 5px;
  left: 5px;
  right: 5px;
  bottom: 5px;
  border-radius: 50%;
  border: 3px solid transparent;
  border-top-color: #e74c3c;
  -webkit-animation: spin 3s linear infinite;
  animation: spin 3s linear infinite;
}

#loader:after {
  content: "";
  position: absolute;
  top: 15px;
  left: 15px;
  right: 15px;
  bottom: 15px;
  border-radius: 50%;
  border: 3px solid transparent;
  border-top-color: #f9c922;
  -webkit-animation: spin 1.5s linear infinite;
  animation: spin 1.5s linear infinite;
}

#loader-logo {
  display: block;
  position: absolute;
  left: 48%;
  top: 46%;
  background: url("../../images/avatar/avatar-2.png") no-repeat center center;
  z-index: 1032;
}

@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

.loaded #loader-wrapper {
  visibility: hidden;
  -webkit-transform: translateY(-100%);
  -ms-transform: translateY(-100%);
  transform: translateY(-100%);
  -webkit-transition: all 0.3s 1s ease-out;
  transition: all 0.3s 1s ease-out;
}

.loaded #loader-wrapper .loader-section.section-left {
  -webkit-transform: translateX(-100%);
  -ms-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
  transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.loaded #loader-wrapper .loader-section.section-right {
  -webkit-transform: translateX(100%);
  -ms-transform: translateX(100%);
  transform: translateX(100%);
  -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
  transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.loaded #loader {
  opacity: 0;
  -webkit-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
}

.progress {
  background-color: rgba(255, 64, 129, 0.22);
}

/* JavaScript Turned Off */
.no-js #loader-wrapper {
  display: none;
}


/* Loading CSS */
.loading-overlay{
  position: absolute;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 10000;
}

.loading-text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 30px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}



		/*
		* LOADING
		*/
		#loading {
			position:fixed;
			width:100%;
			left:0;right:0;top:0;bottom:0;
			background-color: rgba(255,255,255,0.8);
			z-index:9999;
			display:none;
		}

		#loading p {
			left: 0;
			position: absolute;
			text-align: center;
			color: black;
			top: 48%;
			width: 100%;
		}

		@-webkit-keyframes spin {
			from {-webkit-transform:rotate(0deg);}
			to {-webkit-transform:rotate(360deg);}
		}

		@keyframes spin {
			from {transform:rotate(0deg);}
			to {transform:rotate(360deg);}
		}

		#loading::after {
			content:'';
			display:block;
			position:absolute;
			left:50%;
			margin-left:-20px;
			top:40%;
			width:40px;height:40px;
			border-style:solid;
			border-color:black;
			border-top-color:transparent;
			border-width: 4px;
			border-radius:50%;
			-webkit-animation: spin .8s linear infinite;
			animation: spin .8s linear infinite;
		}

 @media (orientation:portrait) {
 .chart-container {
   max-height: 200px;
 }
}

@media (orientation:landscape) {
 .chart-container {
   max-height: 320px;
 }
}

.customSwalBtn{
    background-color: rgba(214,130,47,1.00);
    border-left-color: rgba(214,130,47,1.00);
    border-right-color: rgba(214,130,47,1.00);
    border: 0;
    border-radius: 3px;
    box-shadow: none;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    font-weight: 500;
    margin: 30px 5px 0px 5px;
    padding: 10px 32px;
  }
  
  .testimoni { max-width:540px; max-height:469px;margin: auto;}

  </style>
  
  
  
	



<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- DataTables -->
<!--
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
-->   
<script src="<?php echo base_url()?>assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap.min.js"></script>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<!-- Slider -->

<script src="<?php echo base_url()?>assets/skitter-master/dist/jquery.skitter.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/skitter-master/dist/skitter.css" media="all">



<!-- Export Table -->

<script src="<?php echo base_url()?>assets/DataTables/datatables.editor.min.js"></script>
<script src="<?php echo base_url()?>assets/DataTables/datatables.select.min.js"></script>
<script src="<?php echo base_url()?>assets/DataTables/datatables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/DataTables/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/DataTables//buttons.html5.min.js"></script>


<!-- tableExport Library -->
<script src="<?php echo base_url()?>assets/tableExport/libs/FileSaver/FileSaver.min.js"></script>
<script src="<?php echo base_url()?>assets/tableExport/libs/js-xlsx/xlsx.core.min.js"></script>
<script src="<?php echo base_url()?>assets/tableExport/libs/jsPDF/jspdf.min.js"></script>
<script src="<?php echo base_url()?>assets/tableExport/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script src="<?php echo base_url()?>assets/tableExport/libs/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/tableExport/libs/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>assets/tableExport/libs/es6-promise/es6-promise.auto.min.js"></script>
<script src="<?php echo base_url()?>assets/tableExport/libs/html2canvas/html2canvas.min.js"></script>
<script src="<?php echo base_url()?>assets/tableExport/tableExport.min.js"></script>


   
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- timepicker -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/plugins/timepicker/bootstrap-timepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/dist/js/demo.js"></script>

<!--TOOGLE-->
<script src="<?php echo base_url()?>assets/js/bootstrap-toggle.js"></script>

<!--CHART-->
<script src="<?php echo base_url()?>assets/js/Chart.min.js"></script>
<script src="<?php echo base_url()?>assets/js/chartjs-plugin-datalabels.js"></script>

<!--VALIDATOR-->
<script src="<?php echo base_url()?>assets/js/validator.js"></script>

<!--CoreSlider-->
<script src="<?php echo base_url()?>assets/js/coreSlider.js"></script>
  
<!--Freeze Table-->
<script src="<?php echo base_url()?>assets/sticky-table/jquery-stickytable.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/sticky-table/jquery-stickytable.css">

<!--SWEETALERT-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/sweetalert2/sweetalert2.css">
<script src="<?php echo base_url()?>assets/sweetalert2/sweetalert2.all.js"></script>  
 
</head>
<body class="hold-transition skin-blue layout-top-nav">



<div class="wrapper">
	
	<div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>


   <header class="main-header" >
    <nav id="header_common" class="navbar-light navbar-fixed-top">
      <div class="container">
        <div class="navbar-header" >
          <a href="<?php echo base_url();?>" class="navbar-brand"><img src="<?php echo base_url('assets/img/GREAT BANUA.png') ?>" class="img-fluid mb-4" alt="" height="35px" ></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <?php if($this->session->isLogin == true){ ?>
              <a href="<?= base_url();?>auth/do_logout" >Logout</a>
              <?php }?>
              </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>