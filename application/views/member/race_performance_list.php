<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<?php $this->load->view('template/breadcrumb') ?>
						<h4 class="page-title">Race Performance</h4>
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
									<h4 class="header-title"><?php echo $performance->row()->race_type .' on '. $performance->row()->date.' at '. $performance->row()->location ?></h4>
								</div>
							</div>


							<?php $this->load->view('template/alert_message') ?>
							<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
								<thead>
								<tr>
									<th>Swimmer</th>
									<th>Duration</th>
									<th>Position</th>
									<th>Notes</th>
<!--									<th>Date</th>-->
								</tr>
								</thead>

								<tbody>
								<?php foreach ($performance->result() as $row) { ?>
									<tr>
										<td><?php echo $row->first_name .' '. $row->last_name ?></td>
										<td><?php echo $row->duration ?></td>
										<td><?php echo $row->position ?></td>
										<td><?php echo $row->notes ?></td>
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
