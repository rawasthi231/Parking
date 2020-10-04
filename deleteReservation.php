<?php
	include("connection.php");
	if ($_POST['lotId']) {
		$lotId = $_POST['lotId'];
		$getTokenNo = mysqli_query($con, "select * from reserved_lots where id = $lotId");
		$data = mysqli_fetch_array($getTokenNo);
		$tokenNumber = $data['tokenNumber'];

		if(mysqli_query($con, "delete from reserved_lots where id = $lotId")){
			echo '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					<P class="text-center text-danger">Reserved lot has been deleted</P>
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				</div>
			';
		}

		mysqli_query($con, "update tokens set category = 'general' where tokenNumber = '$tokenNumber'");

	} 
	else if ($_POST['clientId']) {
		$clientId = $_POST['clientId'];
		$data = array();
		$i = 0;
		$getTokens = mysqli_query($con, "select tokenNumber from reserved_lots where clientId = $clientId");
		while($result = mysqli_fetch_array($getTokens)){
			$data[$i] = $result['tokenNumber'];
			$i++;
		}
		if(mysqli_query($con, "delete from reserved_lots where clientId = $clientId")){
			echo '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					<P class="text-center text-danger">All reserved lots has been deleted</P>
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				</div>
			';
		}	
		foreach ($data as $dataRow) {
			mysqli_query($con, "update tokens set category = 'general' where tokenNumber = '$dataRow'");	
		}	
	}
	else{
		echo "
			<h3>Error 404 ! page not found.</h2>
			<a href='index.php'>Go to site</a>
		";
	}

?>