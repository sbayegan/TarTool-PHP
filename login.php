<?php
include('datalogin.php');
$username = mysqli_real_escape_string($conn,$_POST['user']);
$password = mysqli_real_escape_string($conn,$_POST['pass']);

$row = $conn->query("SELECT * FROM USERS WHERE USERNAME='$username'");
$result = mysqli_fetch_assoc($row);
$hash = $result["PASSWORD"];
//$hash = mysqli_real_escape_string($hash);
if(password_verify($password,$hash)){

if($result["CONFIRMED"] == 1){

$to = "saeidjobs@gmail.com";
$subject = "$username logged in";
$header = "From: submission@tartool.com \r\n";
$header .="Content-Type: text/html; charset=ISO-8859-1 \r\n";
$message = "
<!DOCTYPE html>
<html>
<head>
<title>
User $username logged in
</title>
</head>
<body>
<p>
A new login from $username <br>
<br>
<br>
Cheers, <br>
Tartool team<br>
</p>
</body>
</html>
";
mail($to,$subject,$message, $header);



setcookie("junto", $result["USERID"], time() + (86400 * 30), "/"); // 86400 = 1 day
echo '1';
}
if($result["CONFIRMED"] == 0){echo '-1';}



}
else{
echo '0';
}

//echo $pass;

$conn->close();
?>
