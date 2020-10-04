<?php

	include("connection.php");
	if (isset($_POST['typeTitle'])) {
		$typeTitle = $_POST['typeTitle'];

		$getTypeId = mysqli_query($con, "select id from vehicle_types where typeTitle = '$typeTitle'");
		$vehicleType = mysqli_fetch_array($getTypeId);
		$typeId = $vehicleType['id'];

		$run = mysqli_query($con, "select * from tokens where typeId = $typeId and status = 'free' and category = 'general' and remarks = 'operational'  ORDER BY id ASC");
		while($type=mysqli_fetch_array($run)){
			echo "<option>".$type['tokenNumber']."</option>";
		}	
	}
	

?>