<?php
//Since port has been changed on XAMPP, change MySQL server connections.
$servername = "localhost";
$username = "root";
$password = "";
$database="dblab8";


$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
	die("<script>alert('Connection Failed.')</script>");
}
