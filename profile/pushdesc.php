<?php
include('../datalogin.php');

if(isset($_POST['desc']) && !empty($_POST['desc']) && isset($_COOKIE['junto'])){
$desc = mysqli_real_escape_string($conn,$_POST['desc']);
$id = $_COOKIE['junto'];
$query = "UPDATE USERS SET DESCRIPTION='".$desc."' WHERE USERID=".$id;
$conn->query($query);
echo stripslashes($desc);
}
else{
	echo 0;
}


?>