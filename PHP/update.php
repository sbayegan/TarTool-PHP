<?php
include('../datalogin.php');
// Retrieve all of the information from the form to be processed and saved in the database
if(!isset($_POST['delpass'])){
	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$pass = mysqli_real_escape_string($conn,$_POST['pass']);
	$newpass = mysqli_real_escape_string($conn,$_POST['newpass']);
	$row = $conn->query("SELECT * FROM USERS WHERE USERNAME='$user'");
	$result = mysqli_fetch_assoc($row);
	$hash = $result["PASSWORD"];

		if(password_verify($pass,$hash)){
		$hashedpassword = password_hash($newpass , PASSWORD_BCRYPT );
		$conn->query("UPDATE USERS SET PASSWORD='$hashedpassword' WHERE USERNAME='$user'");
		echo 1;
		}

		else{echo 0;}
}//if(!isset($_POST['delpass']))

else{
	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$pass = mysqli_real_escape_string($conn,$_POST['delpass']);
	$row = $conn->query("SELECT * FROM USERS WHERE USERNAME='$user'");
	$result = mysqli_fetch_assoc($row);
	$hash = $result["PASSWORD"];
	$userid = $result["USERID"];
		/////  I COULD SEND AND EMAIL TO THE USER HERE TO NOTIFY THEM OF THE DELETION
		if(password_verify($pass,$hash)){
		$conn->query("DELETE FROM USERS WHERE USERID='$userid'");
		$conn->query("DELETE FROM FAVOURITES WHERE USERID='$userid'");
		$conn->query("DELETE FROM INTERESTS WHERE USERID='$userid'");
		echo 1;
		}
		else{echo 0;}// Just in case the password was wrong


}






$conn->close();
?>
