<?php

$msg = $this->session->flashdata('msg');
$alert_type = $this->session->flashdata('alert_type');

?>

<?php if ($msg) { ?>
	<div class="alert <?php echo $alert_type ?> alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<?php echo $msg ?>
	</div>

<?php } ?>
