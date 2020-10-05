
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ARNET - Login</title>
	<link rel="icon" href="<?php echo base_url()?>assets/img/favicon.png" type="image/gif" sizes="32x32"> 
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE-2.4.15/dist/css/AdminLTE.min.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<style>
	
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
		
	</style>
  
	<!-- jQuery 3 -->
	<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url()?>assets/AdminLTE-2.4.15/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/validator.js"></script>

	<script>
		$(window).on('load', function() {
			setTimeout(function() {
				$('body').addClass('loaded');
			}, 200);
		});
		
		$(document).ready(function() {
			$('#login_form').validator().on('submit', function (e) {
			  if (e.isDefaultPrevented()) {
				// handle the invalid form...
			  } else {
				$( "#info_loading" ).slideDown("fast");
				$( "#info_warning" ).hide();
				$( "#info_success" ).hide();
				window.setTimeout(function(){
					
					$.post('<?= base_url('auth/do_login') ?>', {
						username:$('#username').val(),
						password:$('#password').val()
					}, function (result) {
						$('#info_loading').slideUp('fast');
						if(result.status == 'OK'){
							$( "#info_success" ).slideDown("fast");
							window.setTimeout(function(){
								window.location.href = "<?php echo base_url();?>";
							}, 1000);
						}else{
							$( "#info_warning" ).slideDown("fast");
						}
					}, 'json')
					.fail(function() {
						$('#info_loading').slideUp('fast');
						alert('Error, hubungi admin');
					});
					
				}, 1000);
				
				e.preventDefault();
				// everything looks good!
			  }
			});
		});
	</script>
  
</head>
<body class="hold-transition login-page">
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
    </div>
	
	<div class="login-box">
		<div class="login-logo">
			<b>ARNET</b>
		</div>
		<div class="login-box-body">
		
			<div id="info_loading" class="alert alert-info alert-dismissible" style="padding:10px;display:none">
                <button type="button" style="margin-right:20px" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-spinner fa-spin"></i>&nbsp&nbsp&nbsp&nbsp Loading...
			</div>
			<div id="info_success" class="alert alert-success alert-dismissible" style="padding:10px;display:none">
                <button type="button" style="margin-right:20px" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-check"></i>&nbsp&nbsp&nbsp&nbsp Login berhasil.
			</div>
			<div id="info_warning" class="alert alert-warning alert-dismissible" style="padding:10px;display:none">
                <button type="button" style="margin-right:20px" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-warning"></i>&nbsp&nbsp&nbsp&nbsp Login gagal.
			</div>
		
			<p class="login-box-msg">Sign in to start your session</p>

			<form id="login_form" action="" method="post" data-toggle="validator">
				<div class="form-group has-feedback">
					<input type="text" id="username" class="form-control" name="username" placeholder="Username / NIK" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				
				<div class="form-group has-feedback">
					<input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				
				<div class="row">
					<div class="col-xs-8">
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
