<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<h4 class="page-title">User Group</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<?php $name = $user_group_name->row(); ?>

							<h4 class="header-title">User Group (<?php echo $name->user_group; ?>)</h4>
							<div class="">
								<?php if (isset($message) && $message != "") { ?>
									<div class="alert alert-success" role="alert">
										<?php echo $message; ?>
									</div>

								<?php } ?>
								<div class="panel panel-white">

									<div class="panel-body">
										<form method="post"
											  action="<?php echo base_url() . 'index.php/user/user/save_user_group?edit=' . $name->user_group_id ?>"/>
										<input hidden="" type="text" name="user_group_name"
											   value="<?php echo $name->user_group; ?>"/>
										<div class="row">
										<?php foreach ($query_parent->result() as $row_parent)
											if ($row_parent->module != "") { ?>
												<div class="col-lg-4">
													<!-- Portlet card -->
													<div class="card">
														<div class="card-header bg-blue py-3 text-white">
															<div class="card-widgets">
																<a data-toggle="collapse" href="#div_<?php echo $row_parent->module_id; ?>"
																   role="button" aria-expanded="false"
																   aria-controls="cardCollpase2"><i
																			class="mdi mdi-minus"></i></a>
															</div>
															<h5 class="card-title mb-0 text-white"><?php echo $row_parent->module; ?></h5>
														</div>
														<div id="div_<?php echo $row_parent->module_id; ?>" class="collapse">
															<div class="card-body">
																<?php foreach ($query_module->result() as $row_module) {
																	if ($row_module->parent_module_id == $row_parent->module_id) { ?>

																		<?php if ($row_parent->module != "") { ?>
																			<div class="">
																				<label>
																					<input name="<?php echo $row_module->module_id; ?>"
																						   type="checkbox" <?php
																					foreach ($query_check->result() as $row_check) {
																						if ($row_module->module_id == $row_check->module_id) {
																							echo 'checked="checked"';
																						}
																					}
																					?> />
																					<?php echo $row_module->module; ?>
																				</label>
																			</div>
																		<?php } ?>
																	<?php }
																} ?>
															</div>
														</div>
													</div> <!-- end card-->
												</div><!-- end col -->
											<?php } ?>
										</div>
										<div class="row">
											<button class="btn btn-primary m-r-5 m-b-5 pull-right" type="submit">
												Update
											</button>
										</div>
										</form>

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


