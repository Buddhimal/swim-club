<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<!--						<div class="page-title-right">-->
						<!--							<ol class="breadcrumb m-0">-->
						<!--								<li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>-->
						<!--								<li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>-->
						<!--								<li class="breadcrumb-item active">Validation</li>-->
						<!--							</ol>-->
						<!--						</div>-->
						<h4 class="page-title">User Group</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<h4 class="header-title">Group List</h4>
							<?php if (isset($message) && $message != "") { ?>
								<div class="alert alert-success" role="alert">
									<?php echo $message; ?>
								</div>

							<?php } ?>
							<div class="panel panel-white">
								<div class="panel-heading clearfix">
									<button id="add_new_group" type="button" class="btn btn-primary m-r-5 m-b-5"><i
												class="fa fa-plus"></i> New User Group
									</button>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
											<tr>
												<th>#</th>
												<th>User Group</th>
												<th>Users</th>
												<th>Action</th>

											</tr>
											</thead>
											<tbody>
											<?php $row_count = 1;
											foreach ($user_groups->result() as $groups) { ?>
												<tr style="text-align: ">
													<th scope="row">
														<?php echo $row_count ?>
													</th>
													<td>
														<a
																href="<?php echo base_url() ?>index.php/user/user/user_group?group_id=<?php echo base64_encode($groups->user_group_id) ?>">
															<?php echo $groups->user_group ?> </a>
													</td>
													<td>
														<?php echo $groups->user_count ?>
													</td>
													<td>

													</td>

												</tr>
												<?php $row_count++;
											} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div> <!-- end card-body-->
					</div> <!-- end card-->
				</div> <!-- end col-->
			</div>
			<!-- end row -->

		</div> <!-- container -->

	</div> <!-- content -->


	<!--  Modal content for the Large example -->
	<div class="modal fade" id="modal-dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Add New User Group</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?php echo base_url() ?>index.php/user/user/add_new_group"/>
					<div class="modal-body">
						<div class="form-group">
							<li class="fa fa-users">&nbsp;&nbsp;</li>
							<label>New User Group</label>
							<input class="form-control input-rounded" name="user_group"
								   placeholder="Enter User Group" required="" type="text">
						</div>
						<div class="modal-footer">
							<div class="col-md-4 pull-right">
								<button type="submit" class="btn btn-primary m-r-5 m-b-5">
									<i class="fa fa-user"></i>
									Submit
								</button>

							</div>
						</div>
					</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<script>

	function confirm(id) {
		// var id = atob(id);
		swal({
					title: "Are you sure?",
					text: "Your will not be able to recover this Group!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, delete it!",
					closeOnConfirm: false
				},
				function () {
					// swal("Deleted!", "Your imaginary file has been deleted.", "success");

					location.replace("<?php echo base_url() ?>index.php/user/user/delete_user_group?group_id=" + btoa(id));

				});

		// swal({
		//     title: "Are you sure?",
		//     // text: "Your will not be able to recover this imaginary file!",
		//     type: "warning",
		//     showCancelButton: true,
		//     confirmButtonClass: "btn-danger",
		//     confirmButtonText: "Yes, delete it!",
		//     closeOnConfirm: false
		// }).then(() => {
		//     if (result.value) {
		//         // handle Confirm button click
		//         alert("yes");
		//     } else {
		//         alert("No");
		//         // result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
		//     }
		// });
	}

	// swal("Here's a message!")
	$('#add_new_user').click(function (e) {


		$('#modal-dialog').modal({backdrop: 'static', keyboard: false})

	});
</script>


<?php //require_once('loader.php'); ?>
<script>

	$('#add_new_group').click(function (e) {
		$('#modal-dialog').modal({backdrop: 'static', keyboard: false})
	});
</script>
