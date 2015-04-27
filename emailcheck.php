<?php

include('datalogin.php');// Connect to the database - Object 'conn' is created for
			// communication, remember to close it

if(isset($_GET['email'])) //If a username has been submitted
{

$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo '0'; 
}
else{echo '1';}
}

$conn->close();

?>

