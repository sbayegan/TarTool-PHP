<?php
include('datalogin.php');


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
echo $resultone->num_rows;
echo $resulttwo->num_rows;

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
//echo $query;
// send an email to the client
$to = $email;
$subject = "Activate your account";
$header = "From: general@junto.link \r\n";
$header .="Content-Type: text/html; charset=ISO-8859-1 \r\n";
$message = "

<!DOCTYPE html>
<html>
<head>
<title>
activate
</title>
</head>
<body>
<p>

Welcome $name <br>
<br>

<b>Just one more step ...</b> <br>
<br>
Click on the link below to activate your Junto account.<br>
<br>
<a href='http://junto.link/verify.php?code=$hash&id=$userid' > Activate Your Account </a>
<br>
<br>
Cheers, <br>
Junto team<br>
<img src='http://junto.link/pictures/logo.png' alt='logo'/> <br>
</p>
</body>
</html>
";

mail($to,$subject,$message, $header);
echo "Confirmation E-mail sent successfully. You will receive our e-mail in a few minutes.";
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
<head>
<script type="text/javascript">
<!--
   window.location="home.php?sign=1";
//-->
</script>
</head>
</html>
';
$conn->close();
?>
