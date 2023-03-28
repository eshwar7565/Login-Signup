<?php
//Connect to MySQL 
require 'config.php';
session_start();

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: index.php");
}
$empid = $_SESSION['sess_user'];
if (isset($_POST['submit'])) {

	//Store entered values in variables 
	
	
	$pwd = $_POST['pass'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$newpwd=$_POST['newpass'];

	//Check credentials with password and proceed 
	$query = "SELECT * FROM users WHERE email='$empid' AND pass='$pwd'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) != 0) {

		//If any field is left blank, then do not update the attribute. 
		if ($first_name && $last_name && $newpwd) {
			$result = mysqli_query($conn, "UPDATE users SET first_name='$first_name', last_name='$last_name',pass='$newpwd' WHERE email='$empid'");
			if ($result) {
				echo "<script>alert('Profile updated!')</script>";
				header("Location: profile.php");
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		} else if ($first_name) {
			$result = mysqli_query($conn, "UPDATE users SET first_name=$first_name WHERE email='$empid'");
			if ($result) {
				echo "<script>alert('Profile updated!')</script>";
				header("Location: profile.php");
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		} else if ($last_name) {
			$result = mysqli_query($conn, "UPDATE users SET last_name='$last_name' WHERE email='$empid'");
			if ($result) {
				echo "<script>alert('Profile updated!')</script>";
				header("Location: profile.php");
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		}
			else if ($newpwd) {
				$result = mysqli_query($conn, "UPDATE users SET pass='$newpwd' WHERE email='$empid'");
				if ($result) {
					echo "<script>alert('Profile updated!')</script>";
					header("Location: profile.php");
				} else {
					echo "<script>alert('Something went wrong.')</script>";
				}
		} else {
			echo "<script>alert('Atleast one field required.')</script>";
		}
	} else {
		echo "<script>alert('Wrong password.')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->

<body>
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Profile Updation</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
					
					
					
						
						<br />
			
						<div class="row mb-3">
							<label for="pwd" class="col-sm-3 col-form-label">Old Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="pwd" name="pass" required />
							</div>
						</div>
						<br />
						<div class="row mb-3">
							<label for="newpwd" class="col-sm-3 col-form-label">New Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="newpwd" name="newpass" required />
							</div>
						</div>
						
			
						<br />
						<div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="first_name">First Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control"  id="first_name"  name="first_name"/>
							</div>
						</div>
						<br />
						<div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="last_name">Last Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control"  id="last_name" name="last_name" />
							</div>
						</div>
						<br />
						<button type="submit" name="submit" class="btn btn-default">Update</button>
						<a href="profile.php"><br><br>Back to profile</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>