<?php
	include("connection.php");
	if ($_POST['clientId']) {
		$clientId = $_POST['clientId'];
		$output = '
			<table align="center" class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th>Vehicle Type</th>
						<th>Token Number</th>
						<th>Vehicle Number</th>
						<th>Delete Reservation</th>
					</tr>	
				</thead>
			<tbody>	
		';

		$getMyLots =  mysqli_query($con, "select * from reserved_lots where clientId = $clientId");
		if (mysqli_num_rows($getMyLots) == 0) {
			echo '
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
  					<P class="text-center text-warning">You do not have any reserved parking lot. <a href="bookLot.php" title="Reserve new parking lot">Book Now</a> </P>
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				</div>
			';
		} 
		else{
			while($myLot = mysqli_fetch_array($getMyLots)){
				$output .= '
					<tr>
						<td>'.strtoupper($myLot['vehicleType']).'</td>
						<td>'.$myLot['tokenNumber'].'</td>
						<td>'.strtoupper($myLot['vehicleNumber']).'</td>
						<td>
							<button onclick="deleteReservation('.$myLot['id'].');"><i class="fa fa-times text-danger" aria-hidden="true"></i></button>
						</td>
					</tr>
				';
			}
			$output .= '
						</tbody>
					</table>
			';
			echo $output;	
		}
		
	}
	else{
		echo "
			<h3>Error 404 ! page not found.</h2>
			<a href='index.php'>Go to site</a>
		";
	}
	
							
						
?>