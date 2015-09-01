<?php 
$servername = 'locations.cnesdpnjh1yy.us-west-2.rds.amazonaws.com';
$username = 'yell';
$password = 'Toronto1';
$db = 'yell';
$conn = new mysqli($servername, $username, $password,$db) 
//if($conn->connect_error){echo "error";die("Connection failed: " . $conn->connect_error);}
//$conn->close();
?>
