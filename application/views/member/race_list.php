<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<?php $this->load->view('template/breadcrumb') ?>
						<h4 class="page-title">Race List</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<a href="<?php echo base_url()?>race/add" class="btn btn-primary"> Add Race</a>
							<br>
							<br>
							<div class="row mb-2">
								<div class="col-sm-4">
									<h4 class="header-title">All Races</h4>
								</div>
							</div>


							<?php $this->load->view('template/alert_message') ?>
							<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
								<thead>
									<tr>
										<th>Race Type</th>
										<th>Date</th>
										<th>Location</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
								<?php foreach ($race_list->result() as $row) { ?>
									<tr>
										<td><?php echo $row->race_type ?></td>
										<td><?php echo $row->date ?></td>
										<td><?php echo $row->location ?></td>
										<td>
											<a class="btn btn-xs btn-default text-info" title="Add Performance"
											   href="<?php echo base_url('race/performance/add?race_id=' . base64_encode($row->id)) ?>">
												<i class="fa fa-plus"></i></a>
											<a class="btn btn-xs btn-default text-success" title="View Performance"
											   href="<?php echo base_url('race/performance/list?race_id=' . base64_encode($row->id)) ?>">
												<i class="fa fa-th-list"></i></a>
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
