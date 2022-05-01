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

<body class="loading authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 col-lg-6 col-xl-5">
				<div class="card bg-pattern">
					<div class="card-body p-4">
						<?php $this->load->view('template/alert_message') ?>

						<div class="card" id="register_error">
							<div class="card-body bg-danger text-white">
								<h4 class="header-title text-white">Please review the following errors</h4>
								<div class="list-group">
									<ul id="register_error_ul">
									</ul>
								</div>

							</div> <!-- end card-body -->
						</div> <!-- end card-->

						<form action="<?php echo base_url() ?>save_user" id="register_form">

							<div class="form-group">
								<label for="fullname"> First Name</label>
								<input class="form-control" type="text" id="first_name" name="first_name"
									   placeholder="Enter your First Name" required>
							</div>
							<div class="form-group">
								<label for="fullname"> Last Name</label>
								<input class="form-control" type="text" id="last_name" name="last_name"
									   placeholder="Enter your Last Name" required>
							</div>
							<div class="form-group">
								<label for="emailaddress">Email address (Username)</label>
								<input class="form-control" type="text" id="email" name="email"
									   placeholder="Enter your email" required>
							</div>
							<div class="form-group">
								<label for="emailaddress">Date of Birth</label>
								<input class="form-control" type="date" id="dob" name="dob"
									   placeholder="Enter your DOB" required>
							</div>
							<div class="form-group">
								<label for="fullname"> Telephone</label>
								<input class="form-control" type="number" id="tp" name="tp"
									   placeholder="Enter your Teliphone" required>
							</div>
							<div class="form-group">
								<label for="fullname"> Address</label>
								<input class="form-control" type="text" id="address" name="address"
									   placeholder="Enter your Address" required>
							</div>
							<div class="form-group">
								<label for="fullname"> Postcode</label>
								<input class="form-control" type="number" id="postcode" name="postcode"
									   placeholder="Enter your Postcode" required>
							</div>
							<div class="form-group">
								<label for="fullname"> Role</label>
								<select class="form-control" name="role" id="role" required>
									<option value="2">Parent</option>
									<option value="3">Coach</option>
									<option value="4">Swimmer</option>
								</select>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<div class="input-group input-group-merge">
									<input type="password" id="password" name="password" class="form-control"
										   placeholder="Enter your password" required>
									<div class="input-group-append" data-password="false">
										<div class="input-group-text">
											<span class="password-eye"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group mb-0 text-center">
								<button class="btn btn-success btn-block" type="submit" id="btn_register"> Sign Up
								</button>
							</div>

						</form>

					</div> <!-- end card-body -->
				</div>
				<!-- end card -->

				<div class="row mt-3">
					<div class="col-12 text-center">
						<p class="text-white-50">Already have account? <a href="<?php echo base_url() ?>login"
																		  class="text-white ml-1"><b>Sign In</b></a></p>
					</div> <!-- end col -->
				</div>
				<!-- end row -->

			</div> <!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end page -->
<!-- end auth-fluid-->

<!-- Vendor js -->
<script src="<?php echo base_url(); ?>/assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>

</body>


<script type="text/javascript">
	$(document).ready(function () {

		jQuery("div#register_error").hide();

		$("#btn_register").click(function () {

			$(this).attr('class', 'btn btn-success btn-block disabled');
			// $("#register_form").submit();
		});

		$("#register_form").submit(function (e) {
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
					// showRegisterError("")

					jd = $.parseJSON(data)
					if (jd.success)
						$(location).attr('href', jd.data);
					else {
						jQuery("div#register_error").show();
						showRegisterError(jd.data)
					}

					$("#btn_register").attr('class', 'btn btn-success btn-block');
				},
				error: function (jqXHR, textStatus, errorThrown) {
					$("#btn_register").attr('class', 'btn btn-success btn-block');
					//alert(errorThrown);
				}
			});

		});
	});

	function showRegisterError(errors) {
		$("div#register_error").show();

		document.getElementById('register_error_ul').innerHTML = "";
		errors.forEach((element) => {
			el = document.createElement('li');
			el.innerHTML = element;
			document.getElementById('register_error_ul').appendChild(el);
		});
		// el = document.createElement('li');
		// el.innerHTML = 'Jeff';
		// document.getElementById('register_error_ul').appendChild(el);

		// console.log(ul)

		// <li>Hello</li>
		// <li>Hello 2</li>
	}
</script>


</html>

<!-- end auth-fluid-form-box-->
