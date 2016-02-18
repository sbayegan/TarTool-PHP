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

$conn-query("UPDATE USERS SET PASSWORD='$pass' WHERE USEID=$userid");

// Get some of the necessary information.
$result = mysqli_fetch_assoc($resultone);
$name = $result['NAME'];
$email = $result['EMAIL'];








echo'<!DOCTYPE html>
<html>
<head>';
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


echo '</div>';//stick-to-top
echo '<div class="feed-column" >';
echo "<h3> Successful Password Change!</h3>";
echo "<p> <b>$name</b>, your new password was successfully saved.</p>";
echo "<br> <a href='home.php'>Log in</a>";
echo '</div>';
echo "</body>";
echo '</html>
';







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


    This is to inform that your password was just updated.<br>

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
else {
echo'<!DOCTYPE html>
<html>
<head>';
echo '</head>';
echo "<title>";
echo "Invalid Link";
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


echo '</div>';//stick-to-top
echo '<div class="feed-column" >';
echo "<h3>Invalid Link</h3>";
echo "<p> There seems to be something wrong with your request. Contact our team! </p>";
echo '</div>';
echo "</body>";
echo '</html>
';
}
$conn->close();
?>
