<?php
$errors = $this->session->flashdata('errors');
$errors = $errors ? $errors : [];
$readonly = "";
//var_dump(($errors));
//die();
?>
<script src="https://cdn.jsdelivr.net/npm/html-duration-picker@latest/dist/html-duration-picker.min.js"></script>
</body>
<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<?php $this->load->view('template/breadcrumb') ?>
						<h4 class="page-title">Add New Race</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<div class="row mb-2">
								<div class="col-sm-4">
									<h4 class="header-title">Add Race</h4>
								</div>
							</div>
							<div class="card" id="register_error"
								 style="display: <?php echo count($errors) != 0 ? 'inline' : 'none' ?>">
								<div class="card-body bg-danger text-white">
									<h4 class="header-title text-white">Please review the following errors</h4>
									<div class="list-group">
										<ul id="register_error_ul">
											<?php foreach ($errors as $error) { ?>
												<li><?php echo $error ?></li>
											<?php } ?>
										</ul>
									</div>

								</div> <!-- end card-body -->
							</div> <!-- end card-->
							<form action="<?php echo base_url() ?>race/save" id="register_form"
								  method="post">
								<div class="form-group">
									<label for="fullname">Race Type</label>
									<select class="form-control" name="race_type" id="swimming_type" required>
										<option>Free Style</option>
										<option>Backwards</option>
										<option>Butterfly</option>
									</select>
								</div>
								<div class="form-group">
									<label for="emailaddress">Date</label>
									<input class="form-control" type="date" id="date" name="date"
										   required>
								</div>
								<div class="form-group">
									<label for="emailaddress">Location</label>
									<input class="form-control" type="text" id="location" name="location"
										   required>
								</div>

								<div class="form-group mb-0 text-center">
									<button class="btn btn-primary btn-block" type="submit" id="btn_register">Save
									</button>
								</div>

							</form>

						</div> <!-- end card body-->
					</div> <!-- end card -->
				</div><!-- end col-->
			</div>
			<!-- end row-->
			<!-- end row -->

		</div> <!-- container -->

	</div> <!-- content -->
</div>
