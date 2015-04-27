<?php

include('datalogin.php');// Connect to the database - Object 'conn' is created for
			// communication, remember to close it

if(isset($_POST['username'])) //If a username has been submitted
{


$username = mysql_real_escape_string($_POST['username']); // Some clean up ***

$result = $conn->query("SELECT USERNAME FROM USERS WHERE USERNAME='$username'");//query to check if the username is taken
//$result = $conn->query("SELECT * FROM LOCAS");//query to check if the username is taken
$rows = $result->num_rows ;
if($rows){echo '1';} // If there is a record match return one
		   else    {echo '0';}// No record found
}

$conn->close();

?>

