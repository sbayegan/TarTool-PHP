<?php


include('datalogin.php');// Connect to the database - Object 'conn' is created for
			// communication, remember to close it


if(isset($_GET['username'])) //If a username has been submitted
{



$username = mysqli_real_escape_string($conn,$_GET['username']); // Some clean up ***


$result = $conn->query("SELECT USERNAME FROM USERS WHERE USERNAME='$username'");//query to check if the username is taken

$rows = $result->num_rows ;
if($rows){echo '0';} // If there is a record match return one
		   else    {echo '1';}// No record found
}

$conn->close();

?>

