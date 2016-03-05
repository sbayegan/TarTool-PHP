<?php
include('datalogin.php');

// Please read the comments carefully before you make any changes


// First read and get the variables sent by the JS code delivered from the form.


$username = mysqli_real_escape_string($conn,$_POST['user']);
$password = mysqli_real_escape_string($conn,$_POST['pass']);
$conn->query("DELETE FROM LOGIN WHERE DATE<DATE_SUB(NOW(), INTERVAL 15 MINUTE)");

// Then look for the corresponding row in the database. A user with the same username
$row = $conn->query("SELECT * FROM USERS WHERE USERNAME='$username'");
// If you find one match then before you check for its accuracy
// check the LOGIN form to count the recent failed login attempts 
if($row->num_rows == 1){
$result = mysqli_fetch_assoc($row);
$hash = $result["PASSWORD"];
$userid = $result['USERID'];
$ip = $_SERVER['REMOTE_ADDR'];
$failures = $conn->query("SELECT COUNT(*) as attempts from LOGIN where USERID=$userid and DATE>DATE_SUB(NOW(), INTERVAL 15 MINUTE)");
$attempts = mysqli_fetch_assoc($failures);
$attempts = $attempts['attempts'];
	//Now check to see if the user has attempted too many log in requests
	if($attempts > 30){echo 2;}
	else{// else check to see if the provided password is correct. If it isn't, record the failure
		if(password_verify($password,$hash)){
			if($result["CONFIRMED"] == 1){

				$to = "saeidjobs@gmail.com";
				$subject = "$username logged in";
				$header = "From: loginReport@tartool.com \r\n";
				$header .="Content-Type: text/html; charset=ISO-8859-1 \r\n";
				$message = "
					<!DOCTYPE html>
					<html>
					<head>
					<title>
					User $username logged in from $ip
					</title>
					</head>
					<body>
					<p>
					A new login from $username from  $ip<br>
					<br>
					<br>
					Cheers, <br>
					Tartool team<br>
					</p>
					</body>
					</html>";
					mail($to,$subject,$message, $header);
					setcookie("junto", $result["USERID"], time() + (86400 * 30), "/"); // 86400 = 1 day
					echo '1';
			}//if($result["CONFIRMED"] == 1)
			if($result["CONFIRMED"] == 0){
				echo '-1';}
		}//if(password_verify($password,$hash))
	else{
		$conn->query("INSERT INTO LOGIN VALUES($userid,NOW(),'$ip')");
		echo '0';
		}//else
	}//else
}//if($row->num_rows == 1)
if($row->num_rows == 0){
$conn->query = "INSERT INTO LOGIN VALUES(NULL,NOW(),'$ip')";

$failures = $conn->query("SELECT COUNT(*) as attempts from LOGIN where IP='$ip' and DATE>DATE_SUB(NOW(), INTERVAL 15 MINUTE)");
$attempts = mysqli_fetch_assoc($failures);
$attempts = $attempts['attempts'];
if($attempts > 50){ // If you see suspicious number of failed login attemps from an IP email Saeid Bayeganeh
				$to = "saeidjobs@gmail.com";
				$subject = "Failed Logins from $ip";
				$header = "From: securityReport@tartool.com \r\n";
				$header .="Content-Type: text/html; charset=ISO-8859-1 \r\n";
				$message = "
					<!DOCTYPE html>
					<html>
					<head>
					<title>
					$attempts logins from $ip in the past 30 minutes
					</title>
					</head>
					<body>
					<p>
					$attempts logins from $ip in the past 30 minutes<br>
					<br>
					<br>
					Cheers, <br>
					Tartool bot<br>
					</p>
					</body>
					</html>";
					mail($to,$subject,$message, $header);

}
}






//echo $pass;

$conn->close();
?>
