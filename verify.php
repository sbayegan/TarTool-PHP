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
//echo "Activation Successful";
echo'<!DOCTYPE html>
<html>
<head>';
echo '</head>';
echo "<title>";
echo "Successful Activation";
echo "</title>";
echo '<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
';
echo "<body>";
echo '<div class="stick-to-top">';
  // LOGO
  echo '<span class="top-left"> <a href="home.php"><img src="/pictures/logo.png" alt="logo" height="85" width="185"/> </a> </span>';

// POWER BUTTON - Check the cookie and set the color and the link of the power button accordingly
     if(isset($_COOKIE['junto'])){
     echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
     }
     else{
     echo '<span style="position:absolute;right:50px;top:20px;"> <a href="#sign"  data-toggle="modal"><img src="pictures/power.png" height="45" width="45"></a></span>';
     }
echo '</div>';//stick-to-top
echo '<div class="feed-column" >';
echo "<h3 style='color:green;text-align:center;'>Thank you</h3>";
echo "<p style='text-align:center;'> Welcome, your account is now activated. </p>";
echo '</div>';



echo "</body>";

echo '</html>';










}
else 
if($temp["CONFIRMED"] == 1){
echo "Your account has been already activated";
}

$conn->close();
?>
