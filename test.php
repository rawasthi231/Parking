<?php
	include("connection.php");
	$clientId = 1;
		$data = array();
		$i = 0;
		$getTokens = mysqli_query($con, "select tokenNumber from reserved_lots where clientId = $clientId");
		while($result = mysqli_fetch_array($getTokens)){
			$data[$i] = $result['tokenNumber'];
			$i++;
		}
		foreach ($data as $dataRow) {
			echo $dataRow;
		}

?>