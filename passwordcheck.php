<?php


if(isset($_POST['pass'])) //If a username has been submitted
{
$pass = $_POST['pass'];  

    if (preg_match('/^(?=[a-z])(?=[A-Z])[a-zA-Z]{8,}$/', $pass))
{
    echo '1';
}
else {echo '0';}
}



?>

