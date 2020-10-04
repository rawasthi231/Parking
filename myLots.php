<?php
	include("header.php");
?>

	<div class="container">
		<div class="row mt-4">
			<div class="col-md-9">
				<h4 class="text-info">MY RESERVATIONS</h4>	
			</div>
			<div class="col-md-3">
				<button id="deleteAll" class="btn btn-danger btn-block">Delete All &nbsp; &nbsp; &nbsp;<i class="fa fa-trash text-light" aria-hidden="true"></i></button>
			</div>
		</div>
		<div class="row  mt-4">
			<div class="col-md-12 mt-2">
				<input type="hidden" value="<?php echo $data['id']; ?>" id="hiddenClientId">
				<div id="myReservations"></div>
				<div id="successMessage"></div>
				<div id="dialog-confirm" class="ui-state-error ui-widget-header ui-corner-all" title="Warning">
  					<p>All these items will be permanently deleted and cannot be recovered. Are you sure?</p>
				</div>
				<div class="onPageNavigation">
					<a href="dashboard.php"><i class="fa fa-undo-alt" aria-hidden="true"></i> Go Back</a>
				</div>
			</div>
		</div>
	</div>

<?php
	include("footer.php");
?>