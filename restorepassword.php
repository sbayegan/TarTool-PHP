<?php
include('datalogin.php');
function putinterest($user,$interest){
include('datalogin.php');
$query = "INSERT INTO INTERESTS VALUES (".$user.",'".$interest."')";
$conn->query($query);
}

// Retrieve all of the information from the form to be processed and saved in the database
$email = mysqli_real_escape_string($conn,$_POST['email']);
$username = mysqli_real_escape_string($conn,$_POST['username']);

$userid;

// Here I should make sure that the username or the email
// have not been registered in the database so far
// This should be done to prevent users to add duplicates
// if they resubmit the form by refreshing
$resultone = $conn->query("SELECT * FROM USERS WHERE EMAIL='$email'");
$temp = mysqli_fetch_assoc($resultone);
$userid = $temp['USERID'];
$name = $temp['NAME'];
    if(isset($_POST['email']) && !empty($_POST['email']) && ($resultone->num_rows == 1)){
        $hash = rand(0,1000000000);
        $query = "UPDATE USERS SET HASH='$hash',PASSWORD='X' WHERE EMAIL='$email'";
        $conn->query($query);

        // send an email to the client
        $to = $email;
        $subject = "Reset Your Password";
        $header = "From: do-not-reply@tartool.com \r\n";
        $header .="Content-Type: text/html; charset=ISO-8859-1 \r\n";
        $message = "
        <!DOCTYPE html>
        <html>
        <head>
        <title>
        Reset Your Password
        </title>
        </head>
        <body>
        <p>
        Hello $name,<br>
        <br>

        <br>
        Click on the link below to choose a new password.<br>
        <a href='http://www.tartool.com/newpassword.php?code=$hash&id=$userid' > Reset your password </a>
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
            echo'<!DOCTYPE html>
                <html>
                <head>';
            echo '</head>';
            echo "<title>";
            echo "Check You Email";
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
            //echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
            }
            else{
            //echo '<span style="position:absolute;right:50px;top:20px;"> <a href="#sign"  data-toggle="modal"><img src="pictures/power.png" height="45" width="45"></a></span>';
            }
            echo '</div>';//stick-to-top
            echo '<div class="feed-column" >';
            echo "<h3>Verify your email</h3>";
            echo "<p> Please go to your email at <b>\"";echo $email;echo "\" </b>and follow the intructions to get your new password.</p>";
            echo '</div>';
            echo "</body>";
            echo '</html>
            ';

}
else{       echo'<!DOCTYPE html>
                <html>
                <head>';
            echo '</head>';
            echo "<title>";
            echo "Wrong Email";
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
            //echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
            }
            else{
            //echo '<span style="position:absolute;right:50px;top:20px;"> <a href="#sign"  data-toggle="modal"><img src="pictures/power.png" height="45" width="45"></a></span>';
            }
            echo '</div>';//stick-to-top
            echo '<div class="feed-column" >';
            echo "<h3>Wrong E-mail Address</h3>";
            echo "<p> Sorry, couldn't find an association between<b> \"";echo $email;echo "\" </b>and any of the accounts.</p>";
            echo '</div>';
            echo "</body>";
            echo '</html>
            ';

}

$conn->close();
?>
