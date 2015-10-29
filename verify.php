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
echo '<link rel="shortcut icon" href="/pictures/icon.ico">';
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
echo '<div class="feed-column" style="left:0px;">';
echo "<h3 style='color:green;text-align:center;'>Thank you</h3>";
echo "<h4 style='text-align:center;'> Your account is now activated. </h4>";
echo '</div>';

echo '
<div id="sign" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
                <h6 class="modal-title" style="text-align:center;font-size:150%;">Sign in</h6>
            </div>
            
            <div class="modal-body">
                
    <form autocomplete="off">
    <div class="form">
    <label for="username" style="">Username:</label>
    <input type="text" name="username" id="loginusername"  onkeyup="userlogin(this.value)" class="form-control"/>
    <span id="welcome-message" class="text-warning"><small></small></span>

    <label for="password" style="">Password:</label>
    <input type="password" length="25" name="password" id="login-password" onkeyup="login(this.value)" class="form-control"disabled/>
    <span id="condition" style="margin-left: 240px;" class="text-warning"></span>
    </div>

            </div>
            </form>
            <div class="modal-footer">
                 <a href="signup.html" class="btn btn-warning btn-md" role="button">Become a Member</a>
            </div>
        </div>
    </div>
</div>
';


echo "</body>";

echo '</html>';










}
else 
if($temp["CONFIRMED"] == 1){
echo "Your account has been already activated";
}

$conn->close();
?>
