<?php
include('datalogin.php');

//echo $_GET['email'];

if(isset($_GET['email'])) //If a username has been submitted
{

$email = $_GET["email"];
//echo $query;
//echo "<html><br></html>";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
$query = "SELECT * FROM USERS WHERE EMAIL='$email'";
$result = $conn->query($query);

if($result->num_rows > 0){echo '2';}
else {echo '1';} 
}
else{echo '0';}
}

$conn->close();
?>

