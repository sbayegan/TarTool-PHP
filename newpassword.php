<?php
include('datalogin.php');

$hash = $_GET['code'];
$userid = $_GET['id'];

$query = "SELECT * FROM USERS WHERE HASH='$hash' and USERID='$userid'";
$result = $conn->query($query);

if($result->num_rows == 0){


    echo "The link is not valid";
} 
{

$temp = mysqli_fetch_assoc($result);



        $conn->query("UPDATE USERS SET CONFIRMED=1 WHERE HASH='$hash' AND USERID='$userid' AND PASSWORD='X'");   
        //echo "Activation Successful";
        echo'<!DOCTYPE html>
        <html>
        <head>';
        echo '</head>';
        echo "<title>";
        echo "Enter New Password";
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

        echo '</div>';//stick-to-top
        echo '<div class="feed-column" style="left:0px;">';
        echo "<h3 style='color:green;text-align:center;'>Reset Password</h3>";
        echo "<h4 style='text-align:center;'> Please enter your new password. </h4>";
        echo '<form action="registeration.php" method="post" id="form" autocomplete="off">';
        echo '<div class="form-group">
             <label for="password">Password:</label>
             <input type="password" length="25" name="password" id="password" placeholder="at least 8 characters" onkeyup="passcheck(this.value)" class="form-control" />
             <span id="pass-status"> </span> 
             </div>';
        echo '<div class="form-group">
             <label for="password1">Retype Password:</label>
             <input type="password" length="25" name="retype password" id="password1" onkeyup="passmatch()" class="form-control" />
             <span id="pass1-status"> </span> 
             </div>';
        echo '</form>';
        echo '</div>';
        echo "</body>";
        echo '</html>';
}//else
$conn->close();
?>
