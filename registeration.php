<?php
include('datalogin.php');


// Retrieve all of the information from the form to be processed and saved in the database
$name = mysqli_real_escape_string($conn,$_POST['full_name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$username = mysqli_real_escape_string($conn,$_POST['username']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);
$type = mysqli_real_escape_string($conn,$_POST['type']);
$userid;
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

$hashedpassword = password_hash( $pass , PASSWORD_DEFAULT );
$hash = rand(0,1000000000);
$query = "SELECT USER FROM LAST WHERE ONE=1";		// Get the available
$result = $conn->query($query);
$temp = mysqli_fetch_assoc($result);
echo $temp["USER"];
$userid = $temp["USER"];
echo $userid;
$next = $userid + 1;					//Set the next available user id
$query = "UPDATE LAST SET USER='$next' WHERE ONE=1";
$conn->query($query);
echo "<html><br></html>";
							// Here I should make sure that the username or the email
							// have not been registered in the database so far
							// This should be done to prevent users to add duplicates
							// if they resubmit the form by refreshing
$resultone = $conn->query("SELECT * FROM USERS WHERE USERNAME='$username'");
$resulttwo = $conn->query("SELECT * FROM USERS WHERE EMAIL='$email'");

$query = "INSERT INTO USERS VALUES ($userid,'$username','$hashedpassword','$name','$email',NOW(),'$type',0,'$hash')";
$conn->query($query);
echo $query;


$conn->close();
?>
