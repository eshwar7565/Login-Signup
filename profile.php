<?php
//Connect to MySQL server 
require 'config.php';
session_start();

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: index.php");
}

//Find various fields for an employee and save them in variables for display purposes 
$empid = $_SESSION['sess_user'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$empid'");
$row = mysqli_fetch_array($result);

$name1 = $row["first_name"];
$name2 = $row["last_name"];




?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
</head>

<body>
	<h2> <?php echo "Welcome " . $name1 . " " .$name2; ?> </h2>
	
	

    <br />
	<a href="view.php"> View Information </a><br />

	<br />
	<a href="update.php"> Update Information </a><br />

   <br>
	<a href="index.php"> Log out </a>
</body>

</html>