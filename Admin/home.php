<?php
	session_start();
	error_reporting(0);
	if ($_SESSION['usrId']) {
		function getVehicleType(){
			include("../connection.php");
			$run = mysqli_query($con, "select * from vehicle_types ORDER BY id ASC");
			while($type=mysqli_fetch_array($run)){
				echo "<option value='".$type['id']."'>".$type['typeTitle']."</option>";
			}	
		}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>ePMS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="img/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
</head>
<body>
	<div class="container-fluid">
		<div class="row header">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="floatleft">
                    <h2 style="color: #efefef; margin-top: 15px;">Park your vehicles</h2>
                </div>
            </div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<h4>Park a vehicle</h4>
				<form>
					<label>Vehicle Type :</label>
					<select name="vType" onchange="getTokens(this.value)" class="form-control">
						<option>--Select Vehicle Type--</option>
						<?php getVehicleType(); ?>
					</select> <br> <br>
					<label>Vehicle No. : </label> 
					<input type="text" name="vNumber" required class="form-control"> <br> <br>
					<label>Token No. : </label> 
					<select name="token" id="getToken" class="form-control">
						<option>--Token No--</option>
					</select>
				</form>
			</div>
			<div class="col-md-7">
				
			</div>
		</div>

	</div>
	<br>


	<script type="text/javascript">
          function getTokens(typeId){
              $.ajax({
                  url:'getTokens.php',
                  type:'POST',
                  data:{typeId : typeId},
                  success:function(result){
                      $('#getToken').html(result);
                  }
              });
          }
      </script>


 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


<?php

		
	}
	else{
		echo "<script>alert('Login first');
                window.location.href='index.php'</script>";
    }
?>
