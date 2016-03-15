<?php
include('../datalogin.php');

if(isset($_POST['name']) && !empty($_POST['name']) && isset($_COOKIE['junto'])){
$name = mysqli_real_escape_string($conn,$_POST['name']);
$id = $_COOKIE['junto'];
$query = "UPDATE USERS SET NAME='".$name."' WHERE USERID=".$id;
$conn->query($query);
echo stripslashes($name);
}
else{
	echo 0;
}


?>