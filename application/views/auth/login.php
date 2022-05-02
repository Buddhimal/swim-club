<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Log In |Smart Production Monitoring System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />-->
	<!--<meta content="Coderthemes" name="author" />-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico">

	<!-- App css -->
	<link href="<?php echo base_url(); ?>/assets/css/bootstrap-material.min.css" rel="stylesheet" type="text/css"
		  id="bs-default-stylesheet"/>
	<link href="<?php echo base_url(); ?>/assets/css/app-material.min.css" rel="stylesheet" type="text/css"
		  id="app-default-stylesheet"/>

	<link href="<?php echo base_url(); ?>/assets/css/bootstrap-material.min.css" rel="stylesheet" type="text/css"
		  id="bs-dark-stylesheet"/>
	<link href="<?php echo base_url(); ?>/assets/css/app-material.min.css" rel="stylesheet" type="text/css"
		  id="app-dark-stylesheet"/>

	<!-- icons -->
	<link href="<?php echo base_url(); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>

</head>

<body class="loading auth-fluid-pages pb-0">

<div class="auth-fluid">
	<!--Auth fluid left content -->
	<div class="auth-fluid-form-box">
		<div class="align-items-center d-flex h-100">

			<div class="card-body">
				<div class="row">
					<img src="<?php echo base_url(); ?>/assets/images/logointsq.png" alt="" height="150">
				</div>
				<h4 class="mt-0">Welcome To Admin</h4>
				<p class="text-muted mb-4">Enter your email address and password to access account.</p>
				<?php $this->load->view('template/alert_message') ?>

				<!-- form -->
				<form action="<?php echo base_url() ?>auth" method="post" enctype="multipart/form-data"
					  id="loginform">
					<div class="form-group">
						<label for="emailaddress">Email address</label>
						<input class="form-control" id="username" name="username" type="text" required=""
							   placeholder="Enter your username">
					</div>
					<div class="form-group">
						<a href="#" class="text-muted float-right"><small>Forgot your
								password?</small></a>
						<label for="password">Password</label>
						<div class="input-group input-group-merge">
							<input type="password" name="password" id="password" class="form-control"
								   placeholder="Enter your password">
							<div class="input-group-append" data-password="false">
								<div class="input-group-text">
									<span class="password-eye"></span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group mb-3">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="checkbox-signin">
							<label class="custom-control-label" for="checkbox-signin">Remember me</label>
						</div>
					</div>
					<div class="form-group mb-0 text-center">
						<button class="btn btn-primary btn-block" type="submit" id="btn_login">Log In</button>
						<br>
						<div id="login_error" class="alert alert-danger fade-in m-b-15">
							<strong>Error!</strong>
							Invalid Username or Password. If you registered recently, please wait until admin approve your profile.
							<!--								<span class="close" data-dismiss="alert">&times;</span>-->
						</div>
					</div>
					<!-- social-->

				</form>
				<!-- end form-->

				<!-- Footer-->
				<footer class="footer footer-alt">
					<p class="text-muted">Don't have an account? <a href="<?php echo base_url() ?>register"
																	class="text-muted ml-1"><b>Sign Up</b></a></p>
				</footer>

			</div> <!-- end .card-body -->
		</div> <!-- end .align-items-center.d-flex.h-100-->
	</div>
	<!-- end auth-fluid-form-box-->

	<!-- Auth fluid right content -->
	<div class="auth-fluid-right text-center"
		 style="background: url(<?php echo base_url(); ?>/assets/images/sqbg.jpg) no-repeat;Background-size:cover;">
		<div class="auth-user-testimonial">

		</div> <!-- end auth-user-testimonial-->
	</div>
</div>
<!-- end auth-fluid-->

<!-- Vendor js -->
<script src="<?php echo base_url(); ?>/assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>

</body>


<script type="text/javascript">
	$(document).ready(function () {

		jQuery("div#login_error").hide();

		$("#btn_login").click(function () {

			$(this).attr('class', 'btn btn-block btn-default disabled');
			$("#loginform").submit();
		});

		$("#loginform").submit(function (e) {
			e.preventDefault(); //Prevent Default action.

			var formObj = $(this);
			var formURL = formObj.attr("action");
			var formData = new FormData(this);

			$.ajax({
				url: formURL,
				type: 'POST',
				data: formData,
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				success: function (data, textStatus, jqXHR) {

					console.log(data);

					jd = $.parseJSON(data)
					if (jd.retval)
						$(location).attr('href', jd.url);
					else {
						jQuery("div#login_error").show();
					}

					$("#btn_login").attr('class', 'btn btn-primary btn-block btn-flat');
				},
				error: function (jqXHR, textStatus, errorThrown) {
					$("#btn_login").attr('class', 'btn btn-primary btn-block btn-flat');
					//alert(errorThrown);
				}
			});

		});
	});
</script>


<script type="text/javascript">
	//alert("Enter");

	$('#password').keypress(function (event) {
		var keycode = (event.keyCode ? event.keyCode : event.which);

		if (keycode == '13') {

			$("#loginform").submit();
			$("#loginform").submit(function (e) {

				var formObj = $(this);
				var formURL = formObj.attr("action");
				var formData = new FormData(this);

				$.ajax({
					url: formURL,
					type: 'POST',
					data: formData,
					mimeType: "multipart/form-data",
					contentType: false,
					cache: false,
					processData: false,
					success: function (data, textStatus, jqXHR) {

						//alert(data)
						jd = $.parseJSON(data)
						if (jd.retval) {
							jQuery("div#login_error").hide();
							$(location).attr('href', jd.url);
						} else {
							document.getElementById('passowrd').value = "";
							jQuery("div#login_error").show();
						}


						$("#btn_login").attr('class', 'btn btn-primary btn-block btn-flat');
					},
					error: function (jqXHR, textStatus, errorThrown) {
						$("#btn_login").attr('class', 'btn btn-primary btn-block btn-flat');
						//alert(errorThrown);
					}
				});
				e.preventDefault(); //Prevent Default action.
			});
		} //event.stopPropagation();

	});
</script>


</html>

<!-- end auth-fluid-form-box-->
