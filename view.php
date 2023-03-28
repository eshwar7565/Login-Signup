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


$email = $row["email"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ViewInformation</title>
</head>

<table>
		<tr>
			<td>First Name : </td>
			<td><?php echo $name1 ;echo "\t" ; ?></td>
            <br>
        </tr>
        <tr>
            <td>Last Name : </td>
			<td><?php echo $name2; ?></td>
		</tr>
		
		
		
		<tr>
			<td>Email : </td>
			<td><?php echo $email; ?></td>
		</tr>
		
	</table>

</html>