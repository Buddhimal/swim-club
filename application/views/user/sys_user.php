<div class="content-page">
	<div class="content">
		<!-- Start Content-->
		<div class="container-fluid">

			<div id="main-wrapper" class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- begin panel -->
						<div class="panel panel-inverse" data-sortable-id="table-basic-1">
							<div class="panel-heading">
								<h4 class="panel-title">User List</h4>
							</div>
							<div class="panel-body">
								<button id="add_new_user" data-toggle="modal" data-target="#bs-example-modal-lg" type="button" class="btn btn-primary m-r-5 m-b-5"><i
											class="fa fa-plus"></i> New User
								</button>
								<?php if ($msg != "") { ?>
									<div class="alert <?php echo $class_alert ?>" role="alert">
										<?php echo $msg; ?>
									</div>
								<?php } ?>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
										<tr>
											<th>#</th>
											<th>UserName</th>
											<th>User Group</th>
											<th>Name</th>
											<th>Email</th>
											<th style="text-align:center">Status</th>

										</tr>
										</thead>
										<tbody>
										<?php $row_count = 1;
										foreach ($user_list->result() as $users) { ?>
											<tr>
												<th scope="row"><?php echo $row_count ?></th>
												<td><a
															href="<?php echo base_url() ?>index.php/user/user/edit_user?user_id=<?php echo base64_encode($users->user_id) ?>"><?php echo $users->username ?>
													</a></td>
												<td><?php echo $users->user_group ?></td>
												<td><?php echo $users->name ?></td>
												<td><?php echo $users->email ?></td>
												<td align="center">
													<?php if ($users->status_id == 1) echo "<span class='label label-success'>Active</span>"; else echo "<span class='label label-danger'>De-Active</span>"; ?>
												</td>

											</tr>
											<?php $row_count++;
										} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>


<!-- add new user modal -->

<!--  Modal content for the Large example -->
<div class="modal fade" id="modal-dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Add New User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form id="form_data" method="post"
					  action="<?php echo base_url() ?>user/user/add_new_sys_user_page">
					<div class="modal-body">


						<div class="form-group">
							<li class="fa fa-user">&nbsp;&nbsp;</li>
							<label for="input_username">User Name</label>
							<br/>

							<input class="form-control input-rounded" name="username" id="input_username"
								   placeholder="User Name" required="" type="text">
							<label id="input_username-error" style="display:none; color:red;" class="error"
								   for="input_username">Username Already Exists...!</label>
						</div>


						<div class="form-group">
							<li class="fa fa-key">&nbsp;&nbsp;</li>
							<label>Password</label>
							<input class="form-control input-rounded" name="password" placeholder="Password" required=""
								   type="password">
						</div>

						<div class="form-group">
							<li class="fa fa-envelope">&nbsp;&nbsp;</li>
							<label>Email</label>
							<input class="form-control input-rounded" name="email" placeholder="Email" required=""
								   type="email">
						</div>

						<div class="form-group">
							<li class="fa fa-eye">&nbsp;&nbsp;</li>
							<label>Name</label>
							<input class="form-control input-rounded" name="name" placeholder="Name" required=""
								   type="text">
						</div>

						<div class="form-group">
							<li class="fa fa-users">&nbsp;&nbsp;</li>
							<label>User Group</label>
							<select class="form-control m-b-sm input-rounded" name="user_group_id" required="">
								<option value="" disabled selected>Select User Group</option>
								<?php foreach ($user_group->result() as $grops) { ?>
									<option value="<?php echo $grops->user_group_id ?>">
										<?php echo $grops->user_group ?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<li class="fa fa-gears">&nbsp;&nbsp;</li>
							<label>User Status</label>
							<select class="form-control m-b-sm input-rounded" name="status_id" required="">
								<option value="" disabled selected>Select Status</option>
								<option value="1">Active</option>
								<option value="0">De-Active</option>

							</select>
						</div>


					</div>


					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white m-r-5 m-b-5" data-dismiss="modal">Close</a>
						<button type="submit" class="btn btn-sm btn-primary m-r-5 m-b-5 ">
							<i class="fa fa-user"></i>
							Submit
						</button>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!--	--><?php //require_once('loader.php'); ?>

	<script>
		// $(window).load(function () {
		// 	$('#input_username').change();
		// });
		$('#input_username').change(function (e) {
			check_username();
		});


		function check_username() {
			var username_input_text = $.trim($('#input_username').val());
			if (username_input_text.length > 0) {
				$.ajax({
					url: '<?php echo base_url() ?>index.php/user/user/check_valide_username',
					method: 'POST',
					data: {
						username_input_text: username_input_text
					},
					success: function (data) {
						$('#ajaxBusy').hide();
						if ($.trim(data) == true) {
							$('#input_username-error').show();
							$('#input_username').focus();
						} else {
							$('#input_username-error').hide();
						}
					},
					error: function (err, message, xx) {

					}
				});
			}
		}
	</script>

	<script>
		$('#add_new_user').click(function (e) {

			$.ajax({
				url: '<?php echo base_url() ?>index.php/user/user/check_add_user_permission',
				method: 'POST',
				data: {
					module: ''
				},
				success: function (data) {
					console.log(data);
					if (data == 1) {

						$('#form_data')[0].reset();
						$('#input_username-error').hide();
						$('#modal-dialog').modal({backdrop: 'static', keyboard: false})
					} else {
						window.location = "<?php echo base_url() ?>index.php/user/user/no_permission";
					}

				},
				error: function (err, message, xx) {

				}
			});

		});
	</script>
