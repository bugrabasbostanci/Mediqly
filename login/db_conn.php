<?php
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_NAME', 'medicinedb');

 
 // Create connection
 $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 // Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
?>



<!-- <?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "medicinedb";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}
?> -->