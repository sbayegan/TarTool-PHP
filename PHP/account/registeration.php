<?php
include('../../datalogin.php');
function putinterest($user,$interest){
include('../../datalogin.php');
$query = "INSERT INTO INTERESTS VALUES (".$user.",'".$interest."')";
$conn->query($query);

}

// Retrieve all of the information from the form to be processed and saved in the database
$name = mysqli_real_escape_string($conn,$_POST['full_name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$username = mysqli_real_escape_string($conn,$_POST['username']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);
$type = mysqli_real_escape_string($conn,$_POST['type']);
$ipone = $_SERVER['REMOTE_ADDR'];
$iptwo = $_SERVER['HTTP_X_FORWARDED_FOR'];
$userid;

// Here I should make sure that the username or the email
// have not been registered in the database so far
// This should be done to prevent users to add duplicates
// if they resubmit the form by refreshing
$resultone = $conn->query("SELECT * FROM USERS WHERE USERNAME='$username'");
$resulttwo = $conn->query("SELECT * FROM USERS WHERE EMAIL='$email'");


if($resultone->num_rows == 0 && $resulttwo->num_rows == 0 
	&& isset($_POST['username']) && isset($_POST['email'])  
	&& !empty($_POST['username']) && !empty($_POST['email'])
  )
{

/*
echo $name;
echo "<html><br></html>";
echo $email;
echo "<html><br></html>";
echo $username;
echo "<html><br></html>";
echo $pass;
echo "<html><br></html>";
echo $type;
echo "<html><br></html>";
*/
$hashedpassword = password_hash( $pass , PASSWORD_BCRYPT );





$hash = rand(0,1000000000);
$query = "SELECT USER FROM LAST WHERE ONE=1";		// Get the available
$result = $conn->query($query);
$temp = mysqli_fetch_assoc($result);
//echo $temp["USER"];
$userid = $temp["USER"];
//echo $userid;
$next = $userid + 1;					//Set the next available user id
$query = "UPDATE LAST SET USER='$next' WHERE ONE=1";
$conn->query($query);
//echo "<html><br></html>";


$query = "INSERT INTO USERS VALUES ($userid,'$username','$hashedpassword','$name','$email',NOW(),'$type',0,'$hash','$ipone','$iptwo')";
$conn->query($query);

putinterest($userid,"SEO");
putinterest($userid,"Sales");
putinterest($userid,"Naming");
putinterest($userid,"Copywriting");
putinterest($userid,"MarketingAndResearch");
putinterest($userid,"UserFeedback");
putinterest($userid,"ProjectManagement");
putinterest($userid,"InventoryManagement");
putinterest($userid,"Outsourcing");
putinterest($userid,"Funding");
putinterest($userid,"Productivity");
putinterest($userid,"Analytics");
putinterest($userid,"LeanStartup");
putinterest($userid,"Launching");
putinterest($userid,"SocialMediaCommunity");
putinterest($userid,"Administration");
putinterest($userid,"CustomerService");
putinterest($userid,"AcceleratorsAndIncubators");
putinterest($userid,"E-commerce");
putinterest($userid,"Events");
putinterest($userid,"UserInterface");
putinterest($userid,"UserExperience");
putinterest($userid,"MockupsAndWireframing");
putinterest($userid,"HTML");
putinterest($userid,"CSS");
putinterest($userid,"JavaScript");
putinterest($userid,"Themes");
putinterest($userid,"Mobile");
putinterest($userid,"FrontEndiOS");
putinterest($userid,"FrontEndAndroid");
putinterest($userid,"Bootstrap");
putinterest($userid,"XML");
putinterest($userid,"JQuery");
putinterest($userid,"Angular");
putinterest($userid,"Canvas");
putinterest($userid,"SVG");
putinterest($userid,"JSON");
putinterest($userid,"AJAX");
putinterest($userid,"Security");
putinterest($userid,"DataManagement");
putinterest($userid,"Hosting");
putinterest($userid,"PHP");
putinterest($userid,"Python");
putinterest($userid,"ASPNET");
putinterest($userid,"VBScript");
putinterest($userid,"SQL");
putinterest($userid,"C");
putinterest($userid,"C++");
putinterest($userid,"Shell");
putinterest($userid,"Java");
putinterest($userid,"Ruby");
putinterest($userid,"Objective-C");
putinterest($userid,"Swift");
putinterest($userid,"C#");
putinterest($userid,"Debugging");



//echo $query;
// send an email to the client
$to = $email;
$subject = "Activate your account";
$header = "From: do-not-reply@tartool.com \r\n";
$header .="Content-Type: text/html; charset=ISO-8859-1 \r\n";
$message = "
<!DOCTYPE html>
<html>
<head>
<title>
Activate Your TarTool Account
</title>
</head>
<body>
<p>

Welome $name <br>
<br>

<b>Just one more step ...</b> <br>
<br>
Click on the link below to activate your TarTool account.<br>
<a href='http://www.tartool.com/verify.php?code=$hash&id=$userid' > Activate Your Account </a>
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
echo '<link rel="stylesheet" type="text/css" href="../../style.css">
<script src="../../JS/code.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

';

echo "<body>";
echo '<div class="stick-to-top">';
  // LOGO
    echo '<span class="top-left"> <a href="index.php"><img src="/logo/junto_logo_solo.png" alt="logo" height="70" width="60"/> </a> </span>';
  echo '<div class="top-left-name">tarTool</div>';

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
