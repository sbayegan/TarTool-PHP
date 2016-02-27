<?php
include('../datalogin.php');
// Retrieve all of the information from the form to be processed and saved in the database
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

else{
echo 0;
}

$conn->close();
?>
