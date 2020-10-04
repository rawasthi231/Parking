<?php
	include("connection.php");
	$vType = $_POST['vType'];
	$tokenNumber = $_POST['token'];
	$vehicleNo = $_POST['vNumber'];
	$clientId = $_POST['hiddenClientId'];

	if(mysqli_query($con, "insert into reserved_lots(tokenNumber, vehicleType, vehicleNumber, clientId) values('$tokenNumber', '$vType', '$vehicleNo', $clientId)")){
		mysqli_query($con, "update tokens set category = 'reserved' where tokenNumber = '$tokenNumber'");
		echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
  				<P class="text-center text-success">Parking lot has been reserved successfully</P>
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
			</div>
		';
	}
?>