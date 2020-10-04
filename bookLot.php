<?php
	include("header.php");
		function getVehicleType(){
			include("connection.php");
			$run = mysqli_query($con, "select * from vehicle_types ORDER BY id ASC");
			while($type=mysqli_fetch_array($run)){
				echo "<option value='".$type['typeTitle']."'>".$type['typeTitle']."</option>";
			}	
		}
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 mt-2">
				<br> <br>
				<form method="POST" id="lotBookingForm">
					<input type="hidden" name="hiddenClientId" value="<?php echo $data['id'];?>">
					<table width="430" cellspacing="20" cellpadding="10" align="center">
						<tr>
							<td colspan="2">
								<select name="vType" onchange="getTokens(this.value)" class="form-control text-uppercase">
									<option>--Select Vehicle Type--</option>
									<?php getVehicleType(); ?>
								</select>		
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<select name="token" id="getToken" class="form-control text-uppercase">
									<option>--Token No--</option>
								</select>			
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="vehicle" id="registered" checked>Book for a specific vehicle			
							</td>
							<td>
								<input type="radio" name="vehicle" id="common">Book commonly			
							</td>
						</tr>
						<tr id="vNumberRow">
							<td colspan="2">
								<input type="text" name="vNumber" class="form-control text-uppercase" id="vehicleNo" placeholder="vehicle number">			
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<button class="btn-block btn-success" name="btnBookNow" id="bookLot">Book Now</button>
							</td>
						</tr>
					</table>
				</form>
				<br><br>
				<div id="success"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-12 onPageNavigation">
				<a href="dashboard.php"><i class="fa fa-undo-alt" aria-hidden="true"></i>&nbsp; Go Back</a>
			</div>
			<div class="col-md-6 col-sm-12 onPageNavigation">
				<a href="myLots.php" style="float: right;">My Reservations &nbsp;<i class="fa fa-table" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>



<?php
	include("footer.php");
?>