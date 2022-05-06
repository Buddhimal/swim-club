<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<?php $this->load->view('template/breadcrumb') ?>
						<h4 class="page-title">Member List</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row mb-2">
								<div class="col-sm-4">
									<h4 class="header-title">All Members</h4>
								</div>
							</div>


							<?php $this->load->view('template/alert_message') ?>
							<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
								<thead>
								<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>DOB</th>
									<th>Phone</th>
									<th>Address</th>
									<th>Postcode</th>
									<th>Role</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>


								<tbody>
								<?php foreach ($member_list->result() as $customer) { ?>
									<tr>
										<td><?php echo $customer->first_name ?></td>
										<td><?php echo $customer->last_name ?></td>
										<td><?php echo $customer->email ?></td>
										<td><?php echo $customer->dob ?></td>
										<td><?php echo $customer->tp ?></td>
										<td><?php echo $customer->address ?></td>
										<td><?php echo $customer->postcode ?></td>
										<td><?php echo FunctionHelper::get_role_name($customer->role) ?></td>
										<td><?php echo StatusHelper::get_status_badge($customer->is_verified) ?></td>

										<td>
											<a class="btn btn-xs btn-default text-primary"
											   href="<?php echo base_url('member/edit/detail?member_id=' . base64_encode($customer->id)) ?>">
												<i class="fa fa-user-edit"></i></a>
											<?php if ($customer->role == UserRole::Swimmer) { ?>
												<a class="btn btn-xs btn-default text-info"
												   href="<?php echo base_url('member/performance/add?member_id=' . base64_encode($customer->id)) ?>">
													<i class="fa fa-plus"></i></a>
											<?php } ?>
										</td>
									</tr>
								<?php } ?>

								</tbody>
							</table>

						</div> <!-- end card body-->
					</div> <!-- end card -->
				</div><!-- end col-->
			</div>
			<!-- end row-->
			<!-- end row -->

		</div> <!-- container -->

	</div> <!-- content -->
</div>
