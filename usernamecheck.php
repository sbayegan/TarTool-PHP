<?php

include ('datalogin.php');// Connect to the database - Object 'conn' is created for
			// communication, remember to close it


if(isset($POST['username'])) //If a username has been submitted
{
$username = mysql_real_escape_string($POST['username']); // Some clean up ***

$check_for_username = conn->query("SELECT USERNAME FROM USERS WHERE USERNAME='$username'");//query to check if the username is taken
if(mysql_num_rows($check_for_username)){echo '1';} // If there is a record match return one
else{echo '0';}
	
}// No record found
?>
