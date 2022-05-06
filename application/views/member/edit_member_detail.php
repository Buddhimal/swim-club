<?php
$errors = $this->session->flashdata('errors');
$errors = $errors ? $errors : [];
$readonly = $member->role == UserRole::Swimmer && CommonHelper::get_age($member->dob) < 18 ? "readonly" : "";
//var_dump(($errors));
//die();
?>

<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<?php $this->load->view('template/breadcrumb') ?>
						<h4 class="page-title">Member Edit</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<?php if ($member) { ?>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row mb-2">
									<div class="col-sm-4">
										<h4 class="header-title">Edit Members</h4>
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
								<form action="<?php echo base_url() ?>member/update" id="register_form" method="post">
									<input type="hidden" id="member_id" name="member_id"
										   value="<?php echo $this->input->get('member_id') ?>">
									<div class="form-group">
										<label for="fullname"> First Name</label>
										<input class="form-control" type="text" id="first_name" name="first_name"
											   placeholder="Enter your First Name"
											   value="<?php echo $member->first_name ?>"
											   required <?php echo $readonly ?>>
									</div>
									<div class="form-group">
										<label for="fullname"> Last Name</label>
										<input class="form-control" type="text" id="last_name" name="last_name"
											   placeholder="Enter your Last Name"
											   value="<?php echo $member->last_name ?>"
											   required <?php echo $readonly ?>>
									</div>
									<div class="form-group">
										<label for="emailaddress">Email address (Username)</label>
										<input class="form-control" type="text" id="email" name="email"
											   placeholder="Enter your email" value="<?php echo $member->email ?>"
											   required <?php echo $readonly ?>>
									</div>
									<div class="form-group">
										<label for="emailaddress">Date of Birth</label>
										<input class="form-control" type="date" id="dob" name="dob"
											   placeholder="Enter your DOB" value="<?php echo $member->dob ?>"
											   required <?php echo $readonly ?>>
									</div>
									<div class="form-group">
										<label for="fullname"> Telephone</label>
										<input class="form-control" type="number" id="tp" name="tp"
											   placeholder="Enter your Teliphone" value="<?php echo $member->tp ?>"
											   required <?php echo $readonly ?>>
									</div>
									<div class="form-group">
										<label for="fullname"> Address</label>
										<input class="form-control" type="text" id="address" name="address"
											   placeholder="Enter your Address" value="<?php echo $member->address ?>"
											   required <?php echo $readonly ?>>
									</div>
									<div class="form-group">
										<label for="fullname"> Postcode</label>
										<input class="form-control" type="number" id="postcode" name="postcode"
											   placeholder="Enter your Postcode" value="<?php echo $member->postcode ?>"
											   required <?php echo $readonly ?>>
									</div>
									<?php if ($member->role == UserRole::Swimmer) { ?>
										<div class="form-group">
											<label for="fullname"> Parent</label>
											<select class="form-control" name="parent_id" id="parent_id"
													 <?php echo $readonly ?>>
												<option value=""> Select Parent</option>
												<?php foreach ($parents->result() as $row) { ?>
													<option value="<?php echo $row->id ?>" <?php if ($member->parent_id == $row->id) echo "selected" ?> >
														<?php echo $row->first_name . " " . $row->last_name ?>
													</option>
												<?php } ?>

											</select>
										</div>
										<div class="form-group">
											<label for="fullname"> Coach</label>
											<select class="form-control" name="coach_id" id="coach_id"
													required <?php echo $readonly ?>>
												<option value=""> Select Coach</option>
												<?php foreach ($coaches->result() as $row) { ?>
													<option value="<?php echo $row->id ?>" <?php if ($member->coach_id == $row->id) echo "selected" ?>>
														<?php echo $row->first_name . " " . $row->last_name ?>
													</option>
												<?php } ?>

											</select>
										</div>
									<?php } ?>

									<div class="form-group mb-0 text-center">
										<button class="btn btn-primary btn-block" type="submit" id="btn_register">Update
										</button>
									</div>

								</form>

							</div> <!-- end card body-->
						</div> <!-- end card -->
					</div><!-- end col-->
				</div>
			<?php } ?>
			<!-- end row-->
			<!-- end row -->

		</div> <!-- container -->

	</div> <!-- content -->
</div>
