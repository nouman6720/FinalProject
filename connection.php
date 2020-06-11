<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalproject";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Create database connection
$db = mysqli_connect("localhost", "root", "", "finalproject");


$connect_error1="There is problem loading this page please contact to admin error code:B100";
$con = new mysqli('localhost','root','','finalproject');
if ($con->connect_error) {
	    die($connect_error1);
}
 ?>