<!DOCTYPE html>
<html>
<head>
	<title>ePMS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="img/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</head>
<body>
	<div class="container-fluid">
		<div class="row header">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="floatleft">
                    <h2 style="color: #ffffff; margin-top: 15px;">Park your vehicle</h2>
                </div>
            </div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"><br>
				<h3 class="text-center text-primary">Create New Account</h3> <br> 
				<form method="POST">
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="cName" class="form-control" autocomplete="off" required="true">
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="cEmail" class="form-control" autocomplete="off" required="true">
					</div>
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" name="cMobile" class="form-control" autocomplete="off" required="true">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="Password" name="cPass" class="form-control" required="true">
					</div>
					<input type="submit" name="btnSignUp" value="Register" class="btn btn-outline-primary">
				</form>
				<br>
				<a href="index.php" title="Login with existing account">Already have an account?</a>
				<br><br>

<?php
	include("connection.php");
	error_reporting(0);
	if (isset($_POST['btnSignUp'])) {
		$cName = $_POST['cName'];
		$cEmail = $_POST['cEmail'];
		$cMobile = $_POST['cMobile'];
		$pass = md5($_POST['cPass']);
		$run = mysqli_query($con, "insert into clients(clientName, clientEmail, clientMobile, Password) values('$cName', '$cEmail', '$cMobile', '$pass')");
		if ($run) {
			echo "<script>alert('Account created successfully');
				window.location.href='index.php'</script>";
		} else {
			echo '<div class="alert alert-dark alert-dismissible fade show" role="alert">
  						<P class="text-center text-danger">Account couldn\'t be created, try again...</P>
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  						</button>
					</div>';
		}
	}
?>
			</div>
		</div>
		<hr> 
		<p class="text-success text-center"> Designed & Developed at AkshTech Solutions Pvt. Ltd. @ Copyright 2020</p>
	</div>
	
	
	<div id="dialog-confirm" title="Empty the recycle bin?">
  		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
	</div>

	<script>
		$( function() {
    		$( "#dialog-confirm" ).dialog({
      			resizable: false,
      			height: "auto",
      			width: 400,
      			modal: true,
      			buttons: {
        			"Delete all items": function() {
          				alert('Items deleted');
          				$( this ).dialog( "close" );
        			},
        			"Keep all items": function() {
          				alert('Items kept');
          				$( this ).dialog( "close" );
        			},
        			Cancel: function() {
          				$( this ).dialog( "close" );
        			}
      			}
    		});
  		});

	</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>