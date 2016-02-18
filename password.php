<?php
include('datalogin.php');


// Retrieve all of the information from the form to be processed and saved in the database

$userid = mysqli_real_escape_string($conn,$_POST['id']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);
$pass = password_hash( $pass , PASSWORD_BCRYPT );
$hash = mysqli_real_escape_string($conn,$_POST['hash']);


$resultone = $conn->query("SELECT * FROM USERS WHERE USERID=$userid AND HASH=$hash AND PASSWORD='X'");

if($resultone->num_rows == 1)
{
// Update the password in the Database and then send an email to the user.







// send an email to the client
    $to = $email;
    $subject = "Password Change";
    $header = "From: do-not-reply@tartool.com \r\n";
    $header .="Content-Type: text/html; charset=ISO-8859-1 \r\n";
    $message = "
    <!DOCTYPE html>
    <html>
    <head>
    <title>
    Your Password Was Changed
    </title>
    </head>
    <body>
    <p>

    Hi $name, <br>
    <br>


    This is to inform you that your password was just updated.<br>

    <br>
    <br>
    Cheers, <br>
    TarTool team<br>
    <img src='http://www.tartool.com/pictures/logo.png' width='165' height='76' alt='logo'/> <br>
    </p>
    </body>
    </html>
    ";

mail($to,$subject,$message, $header);
//echo "Confirmation E-mail sent successfully. You will receive our e-mail in a few minutes.";


}
else echo "-------- REPEATED SIGNUP -----------
Some of the submitted information are already on our database
There is either a duplicate username or email.

Try again
";//you could redirect users to the home page!
//else if(){}// If the user name has been registered before
//else if(){}// If the email has been already registered!

echo'<!DOCTYPE html>
<html>
<head>';
/*
echo '<script type="text/javascript">
<!--
   window.location="home.php?sign=1";
//-->
</script>';
*/


echo '</head>';
echo "<title>";
echo "Confirm your e-mail";
echo "</title>";
echo '<link rel="shortcut icon" href="/pictures/icon.ico">';
echo '<link rel="stylesheet" type="text/css" href="style.css">
<script src="JS/code.js"></script>
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
echo "<h3>Verify your email</h3>";
echo "<p> Please go to your email at \"";echo $email;echo "\" and verify your address before you log in.</p>";
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

echo '</html>
';
$conn->close();
?>
