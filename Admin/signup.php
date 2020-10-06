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
                    <h2 style="color: #ffffff; margin-top: 15px;">Park your vehicle</h2>
                </div>
            </div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"><br>
				<h3 class="text-center text-primary">Create New Account</h3> <br> 
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="uName" class="form-control" autocomplete="off" required="true">
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="uEmail" class="form-control" autocomplete="off" required="true">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="Password" name="uPass" class="form-control" required="true">
					</div>
					<input type="submit" name="btnSignUp" value="Register" class="btn btn-outline-primary">
				</form>
				<br>
				<a href="index.php" title="Login with existing account">Already have an account?</a>
				<br><br>

<?php
	include("../connection.php");
	error_reporting(0);
	if (isset($_POST['btnSignUp'])) {
		$uName = $_POST['uName'];
		$uEmail = $_POST['uEmail'];
		$pass = md5($_POST['uPass']);
		$run = mysqli_query($con, "insert into users(userName, userEmail, Password) values('$uName', '$uEmail', '$pass')");
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
		<hr> <br> 
		<p class="text-success text-center"> Designed & Developed at AkshTech Solutions Pvt. Ltd. @ Copyright 2020</p>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>