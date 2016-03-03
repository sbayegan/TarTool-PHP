<?php


if(isset($_POST['pass'])) //If a username has been submitted
{
$pass = $_POST['pass'];  

    if(strlen(trim($pass)) > 7)
{
    echo '1';
}
else {echo '0';}
}



?>

