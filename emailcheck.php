<?php

//echo $_GET['email'];

if(isset($_GET['email'])) //If a username has been submitted
{

$email = $_GET["email"];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo '0'; 
}
else{echo '1';}
}


?>

