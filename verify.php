<?php
include('datalogin.php');

$hash = $_GET['code'];
$userid = $_GET['id'];

$query = "SELECT * FROM USERS WHERE HASH='$hash' and USERID='$userid'";

$result = $conn->query($query);
if($result->num_rows == 0){echo "The link is not valid";}
else 
$temp = mysqli_fetch_assoc($result);
if($temp["CONFIRMED"] == 0){
$conn->query("UPDATE USERS SET CONFIRMED=1 WHERE HASH='$hash' AND USERID='$userid'");
echo "Activation Successful";
}
else 
if($temp["CONFIRMED"] == 1){
echo "Your account has been already activated";
}

$conn->close();
?>
